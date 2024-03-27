@extends('layouts.admin') @section('title')
<title>Sửa Danh Mục Sản Phẩm</title>
@endsection @section('content')

<div class="content-wrapper">

    @include('partials.content-header',['name'=>'Category','key'=>'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <form action="{{route('categories.update',['id'=>$category->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <input type="text" class="form-control" value="{{$category->name}}" name="name" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label>Chọn Danh Mục Cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn Danh Mục Cha</option>
                                {!! $categoryoption !!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
