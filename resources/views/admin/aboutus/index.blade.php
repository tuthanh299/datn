@extends('layouts.admin') @section('title')
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
    @include('partials.content-header', ['name' => 'Bài viết giới thiệu', 'key' => ''])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('staticnews.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" value="{{ $staticnews->name }} " class="form-control" name="name"
                                placeholder="Nhập tiêu đề">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control summernote " name="description" rows="3">{{ $staticnews->description }}
                                     </textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control summernote " name="content" rows="3">{{ $staticnews->content }}
                                     </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
