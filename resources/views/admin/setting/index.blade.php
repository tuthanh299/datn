@extends('admin.layouts.admin') @section('title')
    <title>Cấu hình chung</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>

    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Cấu hình chung', 'key' => ''])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Favicon</label>
                                <div class="photoUpload-zone col-4">
                                    <div class="photoUpload-detail" id="photoUpload-preview">
                                        <img class="rounded" src="{{ $settings->favicon_path }}"
                                            alt="Alt Photo">
                                    </div>
                                    <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                        <input type="file" class=" form-control-file" name="favicon_path"
                                            id="file-zone">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                        <p class="photoUpload-or">hoặc</p>
                                        <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn
                                            hình
                                        </p>
                                    </label>
                                    <div class="photoUpload-dimension">Width: 50 px - Height: 50 px
                                        (.jpg|.png|.jpeg)</div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Logo</label>
                                <div class="photoUpload-zone col-4">
                                    <div class="photoUpload-detail" id="photoUpload-preview2">
                                        <img class="rounded" src="{{ $settings->logo_path }}"
                                            alt="Alt Photo">
                                    </div>
                                    <label class="photoUpload-file" id="photo-zone2" for="file-zone2">
                                        <input type="file" class=" form-control-file" name="logo_path"
                                            id="file-zone2">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                        <p class="photoUpload-or">hoặc</p>
                                        <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn
                                            hình
                                        </p>
                                    </label>
                                    <div class="photoUpload-dimension">Width: 50 px - Height: 50 px
                                        (.jpg|.png|.jpeg)</div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Tên doanh nghiệp</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Nhập tên doanh nghiệp" value="{{ $settings->name }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Điện thoại</label>
                                <input type="number" class="form-control" name="phone" placeholder="Nhập điện thoại"
                                    value="{{ $settings->phone }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Mô tả</label>
                                <textarea type="text" class="form-control" name="description" placeholder="Nhập mô tả" value="">{{ $settings->description }}
                                </textarea>
                            </div>
                            <div class="form-group col-6">
                                <label>Zalo</label>
                                <input type="number" class="form-control" name="zalo" placeholder="Nhập zalo"
                                    value="{{ $settings->zalo }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Iframe google map</label>
                                <textarea type="text" class="text-lowercase form-control" name="iframe_map" placeholder="Nhập iframe google map"
                                    value="">{{ $settings->iframe_map }}
                                </textarea>
                            </div>
                            <div class="form-group col-6">
                                <label>Email</label>
                                <input type="email" class="text-lowercase form-control" name="email" placeholder="Nhập email"
                                    value="{{ $settings->email }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"
                                    value="{{ $settings->address }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Fanpage</label>
                                <input type="text" class="text-lowercase form-control" name="fanpage" placeholder="Nhập fanpage"
                                    value="{{ $settings->fanpage }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Link google map</label>
                                <input type="text" class="text-lowercase form-control" name="link_map"
                                    placeholder="Nhập link google map" value="{{ $settings->link_map }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Website</label>
                                <input type="text" class="text-lowercase form-control" name="website" placeholder="Nhập website"
                                    value="{{ $settings->website }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
