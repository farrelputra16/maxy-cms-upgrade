@extends('layout.master')

@section('title', 'Edit Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditCourse', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Course</label>
                    <input type="text" value="{{ $courses->id }}" disabled>
                </div>
                <div class="field">
                    <label for="">Course Name</label>
                    <input type="text" name="name" value="{{ $courses->name }}">
                </div>
                <div class="field">
                    <label for="">Course Slug</label>
                    <input type="text" name="slug" value="{{ $courses->slug }}">
                </div>
                <div class="field">
                    <label for="">Course Description</label>
                    <textarea name="description">{{ $courses->description }}</textarea>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Type</label>
                        <select name="type" class="ui dropdown" id="type_selector">
                            @foreach ($currentDataCourse as $item)
                                <option selected value="{{ $item->m_course_type_id }}">{{ $item->course_type_name }}</option>
                            @endforeach
                            @foreach ($allCourseTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field" id="course_package">
                        <label for="">Course Package</label>
                        <select name="package">
                            @foreach ($currentCoursePackages as $item)
                                <option selected value="{{ $item->course_package_id }}">{{ $item->course_package_name }} - Rp. {{ $item->course_package_price }}</option>
                            @endforeach
                            @foreach ($allCoursePackages as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - Rp. {{ $item->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field" id="mini_fake_price">
                        <label for="">Mini Bootcamp Fake Price</label>
                        <input type="text" name="mini_fake_price" id="fake_price" value="{{ $currentDataCourse->value('fake_price') }}">
                    </div>
                    <div class="field" id="mini_price">
                        <label for="">Mini Bootcamp Price</label>
                        <input type="text" name="mini_price" id="price" value="{{ $currentDataCourse->value('price') }}">
                    </div>
                </div>
                <div class="field">
                    <label for="">Course Difficulty</label>
                    <select name="level" class="ui dropdown">
                        @foreach ($currentDataCourse as $item)
                            <option selected value="{{ $item->m_difficulty_type_id }}">{{ $item->course_difficulty }}</option>
                        @endforeach
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
            console.log("Rapid Onboarding");
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