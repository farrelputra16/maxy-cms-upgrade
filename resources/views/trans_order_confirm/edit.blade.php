@extends('layout.master')

@section('title', 'Edit Transaction Order Confirm')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Edit Order Confirm</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postEditTransOrderConfirm', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="img_keep" value="{{ $currentData->image }}" hidden>
            <input type="text" name="m_bank" value="{{ $m_bank_account_now->m_bank_id }}" hidden>
            <input type="text" name="idtransorder" value="{{ $idtransorder }}" hidden>
            <h4 class="ui dividing header">Order Information</h4>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Order Number</label>
                        <input type="text" name="order_number" value="{{ $currentData->order_confirm_number }}">
                        @if ($errors->has('order_number'))
                            @foreach ($errors->get('order_number') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Date</label>
                        <input type="datetime-local" name="date" value="{{ $currentData->date }}">
                    </div>
                </div>
                <h4 class="ui dividing header">User Information</h4>
                <div class="two fields">
                    <div class="field">
                        <label for="">Account Name</label>
                        <input type="text" name="sender_account_name" placeholder="Masukkan Account Name" value="{{ $currentData->sender_account_name }}">
                    </div>
                    <div class="field">
                        <label for="">Account Number</label>
                        <input type="text" name="sender_account_number" placeholder="Masukkan Account Number" value="{{ $currentData->sender_account_number }}">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">User</label>
                        <select class="ui dropdown" name="user_id" id=""  type="hidden">
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
                        <select class="ui dropdown" name="course_id" id=""  type="hidden">
                            @foreach ($idcourses as $item)
                                <option selected value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
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
                        <select class="ui dropdown" name="course_class_id" id="" type="hidden">
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
                    
                </div>
                <h4 class="ui dividing header">Payment Information</h4>
                <div class="two fields">
                    <div class="field">
                        <label for="">Amount</label>
                        <input type="text" name="total" id="total" value="{{ $currentData->amount }}">
                        @if ($errors->has('total'))
                            @foreach ($errors->get('total') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Bank Account</label>
                        <select class="ui dropdown" name="bank_account_id" id="">
                            <option value="{{ $m_bank_account_now->id }}|{{ $m_bank_account_now->m_bank_id }}" selected>{{ $m_bank_account_now->id }} - {{ $m_bank_account_now->account_name }} - {{ $m_bank_account_now->account_number }}</option>
                            @foreach ($m_bank_account as $item)
                                <option value="{{ $item->id }}|{{ $item->m_bank_id }}">{{ $item->id }} - {{ $item->account_name }} - {{ $item->account_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="Image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="file_image" onchange="preview()">
                    <br>
                    <img id="frame" src="{{ asset('uploads/trans_order/' . $currentData->image) }}" class="img-fluid" />
                </div>
                <div class="ui dividing header"></div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $currentData->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->status == 1 ? "checked" : "" }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getTransOrder") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
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