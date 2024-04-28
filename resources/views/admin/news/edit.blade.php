@extends('admin.layouts.admin') @section('title')
    <title>Sửa Bài viết</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Bài viết', 'key' => '/ Sửa'])
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('news.update', ['id' => $news->id]) }} " method="POST" enctype="multipart/form-data">
                <div class="card-footer text-sm sticky-top">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
                @csrf
                <div class="row col-12">
                    <div class="form-news-left col-xl-8">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Nội dung bài viết
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Bài viết</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Nhập tên Bài viết" value="{!! $news->name !!}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control summernote @error('description') is-invalid @enderror" rows="4">{!! $news->description !!}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung Bài viết</label>
                                    <textarea name="content" class="form-control summernote @error('content') is-invalid @enderror" rows="4">{!! $news->content !!}</textarea>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-news-left col-xl-4">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Hình ảnh bài viết
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            <img class="rounded" src="{{ $news->photo_path }}" alt="Alt Photo">
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                            <input type="file" class=" form-control-file" name="photo_path"
                                                id="file-zone">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn
                                                hình
                                            </p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 220 px - Height: 325 px
                                            (.jpg|.png|.jpeg)</div>
                                    </div>
                                    @error('photo_path')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>

</div>


@endsection
