@extends('layouts.admin') @section('title')
<title>Thêm Nhà Xuất Bản</title>
@endsection @section('content')
@section('css')
 
<link href="{{asset('admins/css/style.css')}}" rel="stylesheet" />
@endsection
<div class="content-wrapper">
   
    @include('partials.content-header',['name'=>'Nhà Xuất Bản','key'=>'/ Thêm'])
     
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-6">
                    <form action="{{route('publisher.store')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label>Tên Nhà Xuất Bản</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên nhà xuất bản" value="{{old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô Tả Nhà Xuất Bản</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4"  >{{old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control-file @error('photo_path') is-invalid @enderror" name="photo_path">
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
