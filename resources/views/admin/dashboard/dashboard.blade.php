@extends('admin.layouts.admin') @section('title')
    <title>Thống kê</title>
    @endsection @section('content')@section('css')
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
    
@endsection
@section('js')
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/adminlte/dist/js/adminlte.js') }}"></script>
 
    <script src="{{ asset('/adminlte/dist/js/adminlte.min.js') }}"></script>
   
    <script src="{{ asset('/adminlte/dist/js/demo.js') }}"></script>
    <script src="{{ asset('/adminlte/dist/js/pages/dashboard2.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
     <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Thống kê', 'key' => ''])
    <div class="content">
        <div class="container-fluid">
             <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Tổng thể loại</span>
                <span class="info-box-number">
                  {{$category->count()}}
                </span>
              </div>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-9 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Tổng sản phẩm</span>
                <span class="info-box-number">{{$product->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-receipt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng số đơn hàng</span>
                <span class="info-box-number">{{$hdb->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!--<div class="col-9 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
            </div>
          </div>-->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Thống kê</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <!--<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>-->
                      <h5 class="description-header">@formatmoney($total_sale)</h5>
                      <span class="description-text">Tổng Doanh Thu</span>
                    </div>
                  </div>
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <!--<span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>-->
                      <h5 class="description-header">@formatmoney($total_import_sale)</h5>
                      <span class="description-text">Tổng Chi</span>
                    </div>
                  </div>
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <!--<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>-->
                      <h5 class="description-header">@formatmoney($total_profit)</h5>
                      <span class="description-text">Tổng Lời</span>
                    </div>
                  </div>
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <!--<span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>-->
                      <h5 class="description-header"></h5>
                      <span class="description-text"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
                <!--/.direct-chat -->
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Đơn hàng mới nhất</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Mã đơn hàng</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($sold_pro as $item)
                        <tr>
                          <td><a href="#">{{$item->order_code}}</a></td>
                          <td>@formatmoney($item->total_price)</td>
                          @switch($item->status)
                          @case(1)
                              <td class="badge badge-warning">Đơn hàng mới đặt</td>
                              @break
                          @case(2)
                              <td class="badge badge-primary">Đã xác nhận</td>
                              @break
                          @case(3)
                              <td class="badge badge-primary">Đang giao hàng</td>
                              @break
                          @case(4)
                              <td class="badge badge-success">Đã giao hàng</td>
                              @break
                          @case(5)
                              <td class="badge badge-danger">Đã huỷ</td>
                              @break
                                  
                          @endswitch
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
@endsection
