@extends('layout.master')

@section('title', 'Edit Transaction Order')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:2%">Edit Order</h2>
        <form class="ui form" action="{{ route('postEditTransOrder', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <h4 class="ui dividing header">Order Information</h4>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Order Number</label>
                        <input type="text" name="order_number" value="{{ $currentData->order_number }}">
                        @if ($errors->has('order_number'))
                            @foreach ($errors->get('order_number') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Date</label>
                        <input type="datetime-local" name="date" value="{{ $currentData->dates }}">
                    </div>
                </div>
                <h4 class="ui dividing header">User Information</h4>
                <div class="four fields">
                    <div class="field">
                        <label for="">User</label>
                        <select class="ui dropdown" name="user_id" id="">
                            <option value="{{ $currentData->user_id }}" selected>{{ $currentData->member_name }}</option>
                            @foreach ($allMember as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <option value="{{ $currentData->course_id }}" selected>{{ $currentData->course_name }}</option>
                            @foreach ($allCourse as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <option value="{{ $currentData->course_class_id }}" selected>{{ $currentData->course_class_batch }}</option>
                            @foreach ($allCourseClass as $item)
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
                            <option value="{{ $currentData->course_package_id }}" selected>{{ $currentData->course_package_name }}</option>
                            @foreach ($allCoursePackage as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            @if ($currentData->payment_status == 0)
                                <option value="0" selected>0 - Not Completed </option>
                                <option value="1">1 - Completed </option>
                                <option value="2">2 - Partial </option>
                                <option value="3">3 - Cancelled </option>
                            @endif
                            @if ($currentData->payment_status == 1)
                                <option value="0">0 - Not Completed </option>
                                <option value="1" selected>1 - Completed </option>
                                <option value="2">2 - Partial </option>
                                <option value="3">3 - Cancelled </option>
                            @endif
                            @if ($currentData->payment_status == 2)
                                <option value="0">0 - Not Completed </option>
                                <option value="1">1 - Completed </option>
                                <option value="2" selected>2 - Partial </option>
                                <option value="3">3 - Cancelled </option>
                            @endif
                            @if ($currentData->payment_status == 3)
                                <option value="0">0 - Not Completed </option>
                                <option value="1">1 - Completed </option>
                                <option value="2">2 - Partial </option>
                                <option value="3" selected>3 - Cancelled </option>
                            @endif
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Total</label>
                        <input type="text" name="total" id="total" value="{{ $currentData->total }}">
                        @if ($errors->has('total'))
                            @foreach ($errors->get('total') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Discount (max 100%)</label>
                        <input type="number" name="discount" id="discount" value="{{ $currentData->discount }}">
                        @if ($errors->has('discount'))
                            @foreach ($errors->get('discount') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">After Discount (automatically)</label>
                        <input type="text" name="total_after_discount" id="afterDisc" value="{{ $currentData->total_after_discount }}">
                        @if ($errors->has('total_after_discount'))
                            @foreach ($errors->get('total_after_discount') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Promotion (Optional)</label>
                        <select class="ui dropdown" name="m_promo_id" id="">
                            @if ($currentData->m_promo_id)
                                <option value="{{ $currentData->m_promo_id }}" selected>{{ $currentData->promotion_name }}</option>
                                @foreach ($allPromotion as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                                @endforeach
                            @else
                                @foreach ($allPromotion as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
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