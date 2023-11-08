@extends('layout.master')

@section('title', 'Edit Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Course</h2>
        <form class="ui form" action="{{ route('postEditCourse', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" value="{{ $courses->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $courses->name }}">
                    </div>
                    <div class="field">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $courses->slug }}">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                            <label for="">Short Description</label>
                            <input type="text" id="short_description" name="short_description" placeholder="Masukkan Short Description" value="{{ $courses->short_description }}">
                        </div>
                    <div class="field">
                            <label for="">Payment Link</label>
                            <input type="text" id="payment_link" name="payment_link" placeholder="Masukkan Payment Link" value="{{ $courses->payment_link }}">
                    </div>
                </div>
                <div class="field">
                    <label for="file">Image</label>
                    <input type="file" name="file_image" id="file_image">
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content">{{ $courses->content }}</textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $courses->description }}</textarea>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Type</label>
                        <select name="type" class="ui dropdown" id="type_selector">
                        @if ($currentDataCourse)
                            <option selected value="{{ $currentDataCourse->m_course_type_id }}">{{ $currentDataCourse->course_type_name }}</option>
                        @endif
                            @foreach ($allCourseTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field" id="course_package">
                        <label for="">Package</label>
                        <select name="package">
                        @if ($currentCoursePackages)
                            <option selected value="{{ $item->course_package_id }}">{{ $item->course_package_name }} - Rp. {{ $item->course_package_price }}</option> 
                            
                        @elseif ($currentCoursePackages  == NULL)
                            <option selected value="">NULL</option> 
                        @endif
                            @foreach ($allCoursePackages as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - Rp. {{ $item->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field" id="mini_fake_price">
                        <label for="">Mini Bootcamp Fake Price</label>
                        <input type="text" name="mini_fake_price" id="fake_price" value="{{ $currentDataCourse ? $currentDataCourse->fake_price : '' }}">

                    </div>
                    <div class="field" id="mini_price">
                        <label for="">Mini Bootcamp Price</label>
                        <input type="text" name="mini_price" id="price" value="{{ $currentDataCourse ? $currentDataCourse->price : '' }}">

                    </div>
                </div>
                <div class="field">
                    <label for="">Difficulty</label>
                    <select name="level" class="ui dropdown">
                        @if ($currentDataCourse)
                            <option selected value="{{ $currentDataCourse->m_difficulty_type_id }}">{{ $currentDataCourse->course_difficulty }}</option>
                        @endif
                        @foreach ($allDifficultyTypes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $courses->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourse") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        if($('#type_selector').val() == 1){
            console.log("Bootcamp");
            $('#mini_fake_price').hide();
            $('#mini_price').hide();
            $('#course_package').show();
        } else if ($('#type_selector').val() == 3){
            console.log("Mini Bootcamp");
            $('#course_package').hide();
            $('#mini_fake_price').show();
            $('#mini_price').show();
        } else {
            console.log("Rapid Onboarding atau Hackathon atau Prakerja atau MSIB");
            $('#mini_fake_price').hide();
            $('#mini_price').hide();
            $('#course_package').hide();
        }

        $('#type_selector').change(function(){
            let val = $(this).val();
            if(val == 1){
              $('#mini_fake_price').hide();
              $('#mini_price').hide();
              $('#course_package').show();
            } else if (val == 3){
                $('#course_package').hide();
                $('#mini_fake_price').show();
                $('#mini_price').show();
            } else {
                $('#mini_fake_price').hide();
                $('#mini_price').hide();
                $('#course_package').hide()
            }
        })

        var rupiah = document.getElementById('fake_price');
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

        var rupiah1 = document.getElementById('price');
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