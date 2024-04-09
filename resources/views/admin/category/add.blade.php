@extends('layouts.admin') @section('title')
<title>Thêm Danh Mục Sản Phẩm</title>
@endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
     <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">

    @include('partials.content-header',['name'=>'Danh Mục Sản Phẩm','key'=>'/ Thêm'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('categories.store')}} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror" placeholder="Nhập tên danh mục">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label>Chọn Danh Mục Cha</label>
                            <select class="form-control select-category-parent" name="parent_id">
                                <option value="0">Chọn Danh Mục Cha</option>
                                {!! $categoryoption !!}
                            </select>
                          
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>


@endsection
