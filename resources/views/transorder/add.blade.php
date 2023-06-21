@extends('layout.master')

@section('title', 'Add Transaction Order')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddTransOrder') }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Order Number</label>
                    <input type="text" name="order_number">
                    @if ($errors->has('order_number'))
                        @foreach ($errors->get('order_number') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Date</label>
                        <input type="datetime-local" name="date">
                    </div>
                    <div class="field">
                        <label for="">Total</label>
                        <input type="text" name="total">
                        @if ($errors->has('total'))
                            @foreach ($errors->get('total') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Discount</label>
                        <input type="text" name="discount">
                        @if ($errors->has('discount'))
                            @foreach ($errors->get('discount') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">After Discount</label>
                        <input type="text" name="total_after_discount">
                        @if ($errors->has('total_after_discount'))
                            @foreach ($errors->get('total_after_discount') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                    <div class="four wide field">
                        <label for="">Status Pembayaran</label>
                        <select class="ui dropdown" name="payment_status" id="">
                            <option value="">-- Status Pembayaran --</option>
                            <option value="0">0 - Not Completed </option>
                            <option value="1">1 - Completed </option>
                            <option value="2">2 - Partial </option>
                            <option value="3">3 - Cancelled </option>

                    </select>
                    </div>
                <div class="four wide field">
                    <label for="">Course</label>
                    <select class="ui dropdown" name="id_course" id="">
                        <option value="">-- Pilih Course --</option>
                        @foreach ($idcourses as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_course'))
                        @foreach ($errors->get('id_course') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="four wide field">
                    <label for="">Course Class</label>
                    <select class="ui dropdown" name="id_course_class" id="">
                        <option value="">-- Pilih Course Class --</option>
                        @foreach ($idcourseclasses as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - Batch {{ $item->batch }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_course_class'))
                        @foreach ($errors->get('id_course_class') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="four wide field">
                    <label for="">Member</label>
                    <select class="ui dropdown" name="id_member" id="">
                        <option value="">-- Pilih Member --</option>
                        @foreach ($idmembers as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_member'))
                        @foreach ($errors->get('id_member') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="four wide field">
                    <label for="">Course Package</label>
                    <select class="ui dropdown" name="id_course_package" id="">
                        <option value="">-- Pilih Course Package --</option>
                        @foreach ($idcoursepackages as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_course_package'))
                        @foreach ($errors->get('id_course_package') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="four wide field">
                    <label for="">Promotion</label>
                    <select class="ui dropdown" name="id_promotion" id="">
                        <option value="">-- Pilih Promotion --</option>
                        @foreach ($idpromotions as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_promotion'))
                        @foreach ($errors->get('id_promotion') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
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
            <button class="right floated ui button primary">Tambah Trans Order</button>
        </form>
        <a href="{{ route("getTransOrder") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection