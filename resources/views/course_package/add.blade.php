@extends('layout.master')

@section('title', 'Add Course Package')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Add Course Package</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postAddCoursePackage') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Package">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    
                    <div class="field">
                        <label for="">Payment Link</label>
                        <input type="text" name="payment_link" placeholder="Masukkan Payment Link ">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Fake Price</label>
                        <input type="text" name="fake" id="fake_price" placeholder="Masukkan Fake Price">
                        @if ($errors->has('fake'))
                            @foreach ($errors->get('fake') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Price</label>
                        <input type="text" name="price" id="price" placeholder="Masukkan Price">
                        @if ($errors->has('price'))
                            @foreach ($errors->get('price') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                    
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="two fields">
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Tambah Course Package</button>
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