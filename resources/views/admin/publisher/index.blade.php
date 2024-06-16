@extends('admin.layouts.admin') @section('title')
<title>Nhà Xuất Bản</title>
@endsection @section('content') 
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper"> 
    @include('admin.partials.content-header',['name'=>'Nhà Xuất Bản','key'=>'/ Danh Sách']) 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('publisher.create')}} " class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th scope="col">Tên Nhà Xuất Bản</th>
                                 
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Thao tác</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $publisher)
                            <tr>
                                
                                <td>{{ $publisher->name }}</td>
                           
                                <td>
                                    <img class="publisher-image-thumb" src="{{ $publisher->photo_path }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('publisher.edit', ['id' => $publisher->id]) }}"
                                        class="btn btn-default">Edit</a>
                                    <a href=" "data-url="{{ route('publisher.delete', ['id' => $publisher->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                 <div class="col-md-12">
                    {{ $publishers->links('pagination::bootstrap-5') }}

                 </div>
            </div> 
        </div> 
    </div> 
</div>


@endsection
