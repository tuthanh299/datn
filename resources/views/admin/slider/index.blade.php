@extends('admin.layouts.admin') @section('title')
<title>Slider</title>
@endsection @section('content') 
@section('css')
<link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper"> 
    @include('admin.partials.content-header',['name'=>'Slider','key'=>'/ Danh Sách']) 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('slider.create')}} " class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Slider</th>
                                
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Thao tác</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>
                                
                                <td class="text-capitalize" >{{ $slider->name }}</td>
                                 
                                <td>
                                    <img class="slider-image-thumb" src="{{ $slider->photo_path }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"
                                        class="btn btn-default">Sửa</a>
                                    <a href=" " data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                 <div class="col-md-12">
                    {{ $sliders->links('pagination::bootstrap-5') }}

                 </div>
            </div> 
        </div> 
    </div> 
</div>


@endsection
