@extends('layout.master')

@section('title', 'Edit Transaction Order')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditTransOrder', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Transaction Order</label>
                    <input type="text" value="{{ $transorders -> id}}" disabled>
                </div>
                <div class="field">
                    <label for="">Order Number</label>
                    <input type="text" name="order_number" value="{{ $transorders->order_number }}">
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Date</label>
                        <input type="datetime-local" name="date" value="{{ $transorders->dates }}">
                    </div>
                    <div class="field">
                        <label for="">Total</label>
                        <input type="text" name="total" value="{{ $transorders->total }}">
                    </div>
                    <div class="field">
                        <label for="">Discount</label>
                        <input type="text" name="discount" value="{{ $transorders->discount }}">
                    </div>
                    <div class="field">
                        <label for="">AFter Discount</label>
                        <input type="text" name="total_after_discount" value="{{ $transorders->total_after_discount }}">
                    </div>
                </div>
                    <div class="four wide field">
                    <label for="">Status Pembayaran</label>
                        <select class="ui dropdown" name="payment_status" id="" value="{{ $transorders->payment_status }}">
                            <option value="">{{ $transorders->payment_status }}</option>
                            <option value="0">0 - Not Completed </option>
                            <option value="1">1 - Completed </option>
                            <option value="2">2 - Partial </option>
                            <option value="3">3 - Cancelled </option>
                        </select>
                    </div>
                    <div class="four wide field">
                        <label for="">ID Course</label>
                        <select class="ui dropdown" name="id_course" id="">
                            <option value="">{{ $transorders-> id_course}}</option>
                            @foreach ($idcourses as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="four wide field">
                        <label for="">ID Course Class</label>
                        <select class="ui dropdown" name="id_course" id="">
                            <option value="">{{ $transorders-> id_course_class}}</option>
                            @foreach ($idcourseclasses as $item)
                                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="four wide field">
                    <label for="">ID Member</label>
                    <select class="ui dropdown" name="id_member" id="">
                        <option value="">{{ $transorders-> id_member}}</option>
                        @foreach ($idmembers as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="four wide field">
                    <label for="">ID Course Package</label>
                    <select class="ui dropdown" name="id_course_package" id="">
                        <option value="">{{ $transorders-> id_course_package}}</option>
                        @foreach ($idcoursepackages as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="four wide field">
                    <label for="">ID Promotion</label>
                    <select class="ui dropdown" name="id_promotion" id="">
                        <option value="">{{ $transorders-> id_promotion}}</option>
                        @foreach ($idpromotions as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label for="">Trans Order Description</label>
                    <textarea name="description">{{ $transorders->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $transorders->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourseClassModule") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection