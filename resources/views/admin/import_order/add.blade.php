@extends('admin.layouts.admin') @section('title')
    <title>Thêm Hóa Đon Nhập</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/admins/css/sumoselect.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/jquery.sumoselect.min.js') }}"></script>
    <script script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
 
    <div class="content">
        <div class="container-fluid pt-3">
            <form action="{{ route('import_order.store') }}" method="POST">
                @csrf
                <div class="card-footer text-sm sticky-top">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
                <div class="row col-12">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Mã hóa đơn</label>
                            <input type="text" class="form-control" name="order_code"
                                value="{{ $ImportOrderCode }}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input type="datetime-local"  class="form-control"
                                name="import_date" value="{{ $TimeCreateImportOrder->format('Y-m-d\TH:i') }}" readonly>
                        </div>
                    </div>
                    @php
                    /*
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input type="number" class="form-control format-price total_price" name="total_price" value="" readonly>
                        </div>
                    </div>
                     */
                     @endphp
                </div>
                <div class="row col-12">
                    <div class="row col-8 list-product-call-by-ajax">
                    </div>
                    <div class="col-4 ">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <strong>
                                        Chọn Sản Phẩm
                                    </strong>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group ">
                                    <select multiple="multiple" name="product[]" data-url="get-product-id"
                                        class="sumoselectimportinvoice">
                                        @foreach ($products as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>


@endsection
