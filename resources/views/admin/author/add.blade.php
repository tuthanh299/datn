@extends('layouts.admin') @section('title')
<title>Thêm Tác Giả</title>
@endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
     <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
   
    @include('partials.content-header',['name'=>'Tác Giả','key'=>'/ Thêm'])
     
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-6">
                    <form action="{{route('author.store')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label>Tên Tác Giả</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên tác giả" value="{{old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô Tả Tác Giả</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"  >{{old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" onchange="previewImage(event)" class="form-control-file @error('photo_path') is-invalid @enderror" name="photo_path">
                            <img id="preview" src="" alt="Image Preview" style="display: none;"/>
                            @error('photo_path')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>  
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
         
    </div>
  
</div>
 

@endsection