@extends('layouts.admin') @section('title')
    <title>Settings</title>
    @endsection @section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Settings', 'key' => ''])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Favicon</label>
                                <input type="file" onchange="previewer1.previewImage(event)"
                                    class="form-control-file  " name="favicon_path">
                                <img id="preview1" src="" alt="Image Preview" style="display: none;" />
                                <div class="col-4 box-image">
                                    <div class="row">
                                        <img class="favicon-setting" src="{{ $settings->favicon_path }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Logo</label>
                                <input type="file" onchange="previewer2.previewImage(event)"
                                    class="form-control-file  " name="logo_path">
                                <img id="preview2" src="" alt="Image Preview" style="display: none;" />
                                <div class="col-4 box-image">
                                    <div class="row">
                                        <img class="logo-setting" src="{{ $settings->logo_path }}" alt="">
                                    </div>
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
                                <textarea type="text" class="form-control" name="description" placeholder="Nhập mô tả"
                                    value="">{{ $settings->description }}
                                </textarea>
                            </div>
                            <div class="form-group col-6">
                                <label>Zalo</label>
                                <input type="number" class="form-control" name="zalo" placeholder="Nhập zalo"
                                    value="{{ $settings->zalo }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Iframe google map</label>
                                <textarea type="text" class="form-control" name="iframe_map" placeholder="Nhập iframe google map"
                                    value="">{{ $settings->iframe_map }}
                                </textarea>
                            </div>
                            <div class="form-group col-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email"
                                    value="{{ $settings->email }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"
                                    value="{{ $settings->address }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Fanpage</label>
                                <input type="text" class="form-control" name="fanpage" placeholder="Nhập fanpage"
                                    value="{{ $settings->fanpage }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Link google map</label>
                                <input type="text" class="form-control" name="link_map"
                                    placeholder="Nhập link google map" value="{{ $settings->link_map }}">
                            </div>
                            <div class="form-group col-6">
                                <label>Website</label>
                                <input type="text" class="form-control" name="website" placeholder="Nhập website"
                                    value="{{ $settings->website }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
