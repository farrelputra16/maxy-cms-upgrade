@extends('layout.master')

@section('title', 'Add Transaction Order')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddTransOrder') }}" method="post">
            @csrf
            <h4 class="ui dividing header">Order Information</h4>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Order Number</label>
                        <input type="text" name="order_number" placeholder="Masukkan Nomor Order">
                        @if ($errors->has('order_number'))
                            @foreach ($errors->get('order_number') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Date</label>
                        <input type="datetime-local" name="date">
                    </div>
                </div>
                <h4 class="ui dividing header">User Information</h4>
                <div class="four fields">
                    <div class="field">
                        <label for="">User</label>
                        <select class="ui dropdown" name="user_id" id="">
                            <option value="">-- Pilih User --</option>
                            @foreach ($idmembers as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('member_id'))
                            @foreach ($errors->get('member_id') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course</label>
                        <select class="ui dropdown" name="course_id" id="">
                            <option value="">-- Pilih Course --</option>
                            @foreach ($idcourses as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_id'))
                            @foreach ($errors->get('course_id') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course Class</label>
                        <select class="ui dropdown" name="course_class_id" id="">
                            <option value="">-- Pilih Course Class --</option>
                            @foreach ($idcourseclasses as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - Batch {{ $item->batch }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_class_id'))
                            @foreach ($errors->get('course_class_id') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course Package</label>
                        <select class="ui dropdown" name="course_package_id" id="">
                            <option value="">-- Pilih Course Package --</option>
                            @foreach ($idcoursepackages as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_package_id'))
                            @foreach ($errors->get('course_package_id') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <h4 class="ui dividing header">Payment Information</h4>
                <div class="five fields">
                    <div class="field">
                        <label for="">Status Pembayaran</label>
                        <select class="ui dropdown" name="payment_status" id="">
                            <option value="">-- Status Pembayaran --</option>
                            <option value="0">0 - Not Completed </option>
                            <option value="1">1 - Completed </option>
                            <option value="2">2 - Partial </option>
                            <option value="3">3 - Cancelled </option>
                        </select>
                        @if ($errors->has('payment_status'))
                            @foreach ($errors->get('payment_status') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Total</label>
                        <input type="text" name="total" id="total" placeholder="Rp. 0">
                        @if ($errors->has('total'))
                            @foreach ($errors->get('total') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Discount (max 100%)</label>
                        <input type="number" name="discount" id="discount" placeholder="e.g. 5">
                        @if ($errors->has('discount'))
                            @foreach ($errors->get('discount') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">After Discount (automatically)</label>
                        <input type="text" name="total_after_discount" id="afterDisc" placeholder="Rp. 0">
                        @if ($errors->has('total_after_discount'))
                            @foreach ($errors->get('total_after_discount') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Promotion (Optional)</label>
                        <select class="ui dropdown" name="promotion_id" id="">
                            <option value="">-- Pilih Promotion --</option>
                            @foreach ($idpromotions as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="ui dividing header"></div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Tambah Transaksi Order</button>
        </form>
        <a href="{{ route("getTransOrder") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        var total = document.getElementById('total');
		total.addEventListener('keyup', function(e){
			total.value = formatRupiah(this.value, 'Rp. ');
		});
 
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			total     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			if(ribuan){
				separator = sisa ? '.' : '';
				total += separator + ribuan.join('.');
			}
 
			total = split[1] != undefined ? total + ',' + split[1] : total;
			return prefix == undefined ? total : (total ? 'Rp. ' + total : '');
		}

        $( "#discount" ).on( "keyup", function( event ) { 
            var total = $( "#total" ).val().replace('Rp. ', '').split('.').join("");
            var discount = Number(total * $( "#discount" ).val()/100);
            var afterDisc = discount - total;
            
            $( "#afterDisc" ).val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })

        $( "#total" ).on( "keyup", function( event ) { 
            var total = $( "#total" ).val().replace('Rp. ', '').split('.').join("");
            var discount = Number(total * $( "#discount" ).val()/100);
            var afterDisc = discount - total;
            
            $( "#afterDisc" ).val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })
    </script>
@endsection