@extends('layoutshome.index') 
@section('title')
<title>Trang Chủ</title>
@endsection 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Slider -->
    @include('partialshome.slider')
    <!-- Content -->
    @include('partialshome.content')
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
