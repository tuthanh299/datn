@extends('layouts.admin') @section('title')
<title>Sửa Slider</title>
@endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
     <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">

    @include('partials.content-header',['name'=>'Slider','key'=>'/ Sửa'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <form action=" {{route('slider.update',['id'=>$slider->id])}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên Slider</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Nhập tên slider" value="{{$slider->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>

                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="4">{{$slider->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" onchange="previewImage(event)" class="form-control-file @error('photo_path') is-invalid @enderror"
                                name="photo_path">
                                <img id="preview" src="" alt="Image Preview" style="display: none;"/>
                                <div class="col-4 box-image">
                                <div class="row">
                                    <img class="photo-slider" src="{{$slider->photo_path}}" alt="">
                                </div>
                            </div>
                            @error('photo_path')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>


@endsection