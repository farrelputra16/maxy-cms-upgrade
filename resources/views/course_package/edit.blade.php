@extends('layout.master')

@section('title', 'Edit Course Price')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Course Package</h2>
        <form class="ui form" action="{{ route('postEditCoursePackage', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" value="{{ $coursePackages->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $coursePackages->name }}">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Payment Link</label>
                        <input type="text" name="name" value="{{ $coursePackages->payment_link }}">
                    </div>
                    <div class="field">
                        <label for="">Fake Price</label>
                        <input type="text" name="fake" id="fake_price" value="{{ $coursePackages->fake_price }}">
                        @if ($errors->has('fake'))
                            @foreach ($errors->get('fake') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Price</label>
                        <input type="text" name="price" id="price" value="{{ $coursePackages->price }}">
                        @if ($errors->has('price'))
                            @foreach ($errors->get('price') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $coursePackages->description }}</textarea>
                </div>
               
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $coursePackages->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCoursePackage") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
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