@extends('admin.layouts.admin') @section('title')
    <title>Bài viết giới thiệu</title>
    @endsection @section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Bài viết giới thiệu', 'key' => ''])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('staticnews.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" value="{{ $staticnews->name }} "
                                class="form-control @error('name') is-invalid @enderror"" name="name"
                                placeholder="Nhập tiêu đề">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control summernote @error('description') is-invalid @enderror" name="description" rows="3">{{ $staticnews->description }}
                                     </textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control summernote @error('content') is-invalid @enderror" name="content" rows="3">{{ $staticnews->content }}
                                     </textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
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
