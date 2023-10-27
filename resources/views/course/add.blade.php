@extends('layout.master')

@section('title', 'Add Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddCourse') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Course">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course Slug</label>
                        <input type="text" name="slug">
                        @if ($errors->has('slug'))
                            @foreach ($errors->get('slug') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Course Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Type</label>
                        <select name="type" class="ui dropdown" id="type_selector"> 
                            <option selected value="">-- Pilih Tipe Course --</option>
                            @foreach ($allCourseTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('type'))
                            @foreach ($errors->get('type') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field" id="show_course_package">
                        <label for="">Course Price Package</label>
                        <select name="package_price" class="ui dropdown"> 
                            @foreach ($allPackagePrices as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - Rp. {{ $item->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field" id="show_course_mini_fake_price">
                        <label for="">Course Mini Bootcamp Fake Price</label>
                        <input type="text" name="mini_fake_price" id="fake_price">
                    </div>
                    <div class="field" id="show_course_mini_price">
                        <label for="">Course Mini Bootcamp Price</label>
                        <input type="text" name="mini_price" id="mini_price">
                    </div>
                </div>
                <div class="field">
                    <label for="">Course Difficulty</label>
                    <select name="level" class="ui dropdown">
                        @foreach ($allCourseDifficulty as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Tambah Course</button>
        </form>
        <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        if ($('#type_selector').val() == ''){
            $("#show_course_package").hide();
            $("#show_course_mini_price").hide();
            $("#show_course_mini_fake_price").hide();
        }
        $('#type_selector').change(function(){
            var responseID = $(this).val();
            if(responseID == 1){
                $("#show_course_mini_fake_price").hide();
                $("#show_course_mini_price").hide();
                $("#show_course_package").show();
            } else if (responseID == 3){
                $("#show_course_mini_fake_price").show();
                $("#show_course_mini_price").show();
                $("#show_course_package").hide();
            } else {
                $("#show_course_mini_fake_price").hide();
                $("#show_course_mini_price").hide();
                $("#show_course_package").hide();
            }
        })

        var rupiah = document.getElementById('mini_price');
		rupiah.addEventListener('keyup', function(e){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

        var rupiah1 = document.getElementById('fake_price');
		rupiah1.addEventListener('keyup', function(e){
			rupiah1.value = formatRupiah(this.value, 'Rp. ');
		});
 
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah1     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah1 += separator + ribuan.join('.');
			}
 
			rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
			return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
		}
    </script>
@endsection