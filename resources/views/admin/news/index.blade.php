@extends('admin.layouts.admin') @section('title')
<title>Bài viết</title>
@endsection @section('content') 
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper"> 
    @include('admin.partials.content-header',['name'=>'Bài viết','key'=>'/ Danh Sách']) 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('news.create')}} " class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th scope="col">Tên Bài viết</th>
                                
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Thao tác</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newspost as $news)
                            <tr>
                                
                                <td>{{ $news->name }}</td>
                                 

                               
                                <td>
                                    <img class="news-image-thumb" src="{{ $news->photo_path }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('news.edit', ['id' => $news->id]) }}"
                                        class="btn btn-default">Sửa</a>
                                    <a href=" "data-url="{{ route('news.delete', ['id' => $news->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                 <div class="col-md-12">
                    {{ $newspost->links('pagination::bootstrap-5') }}

                 </div>
            </div> 
        </div> 
    </div> 
</div>


@endsection
