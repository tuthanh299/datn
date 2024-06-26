@extends('admin.layouts.admin') @section('title')
    <title>Thêm Danh Mục Sản Phẩm</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">

    @include('admin.partials.content-header', ['name' => 'Danh Mục Sản Phẩm', 'key' => '/ Thêm'])

    <div class="content">
        <div class="container-fluid">

            <form action="{{ route('categories.store') }} " method="POST">
                @csrf
                <div class="row col-12">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="Nhập tên danh mục">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group ">
                            <label>Chọn Danh Mục Cha</label>
                            <select class="form-control select-category-parent" name="parent_id">
                                <option value="0">Chọn Danh Mục Cha</option>
                                {!! $categoryoption !!}
                            </select>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>


        </div>

    </div>

</div>


@endsection
