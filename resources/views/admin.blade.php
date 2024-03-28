<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dedicated Dragon BookStore</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="admin/pluginsfontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('partials.header')
@include('partials.sliderbar')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sản phẩm</h1>
            <a href="{{route("add")}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm</a>
          </div>
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Hình ảnh</th>
              <th>Tên sách</th>
              <th>Nhà xuất bản</th>
              <th>Nổi bật</th> 
              <th>Đơn giá</th>
              <th>Phần trăm giảm</th>
              <th>Giá giảm</th>
              <th>Trạng thái</th>
              <th>Chức năng</th> 
            </tr>
          </thead>
          <tbody>
            @foreach($alls as $all)
            <tr>
              <td>
                <img alt="ảnh lỗi" src="{{ asset('./assets/images/sach/' . $all->MaLoaiSach . '/' . $all->HinhAnh)}}" width="70" height="100"></img>
              </td>
              <td> {{$all->TenSach}} </td>
              <td> {{$all->TenNXB}} </td>
              @if($all->NoiBat)
                <td>
                  <input type="checkbox" id="NoiBat" name="NoiBat" value="yes" checked onclick="return false;"/>
                </td>
              @else
                <td>
                  <input type="checkbox" id="NoiBat" name="NoiBat" value="yes" onclick="return false;"/>
                </td>
              @endif
              <td> {{$all->DonGia}} </td>
              <td> {{$all->PhanTramGiam * 100}} </td>
              <td> {{$all->DonGia - $all->DonGia * $all->PhanTramGiam}} </td>
              @if($all->TrangThai)
                <td>
                  <input type="checkbox" id="TrangThai" name="TrangThai" value="yes" checked onclick="return false;"/>
                </td>
              @else
                <td>
                  <input type="checkbox" id="TrangThai" name="TrangThai" value="yes" onclick="return false;"/>
                </td>
              @endif
              <td>
                <a href="" class="mr-3 func_icon !important" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                <a id="del_btn" href="./del_func.php" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        
      </div>
    </div>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  @include('partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="admin/pluginsjquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/pluginsbootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
</body>
</html>
