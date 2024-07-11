@extends('admin.layouts.admin') @section('title')
    <title>Slider</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
<script type="text/javascript">
    var PERMISSION = @php echo CheckPermissionAdmin(session()->get('user')[0]['id'], 'delete_slider')?'"true"':'"false"' @endphp;
</script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
     <div class="content">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-6">
                    <form action="" class="form-inline" method="GET">
                        @csrf
                        <input class="search-keyword form-control border-end-0 border"
                            value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                            placeholder="Nhập từ khóa để tìm kiếm">
                        <input type="hidden" id="search_route" value="{{ route('slider.index') }}">
                        <div class="input-group-append bg-primary rounded-right">
                            <button class="btn btn-navbar text-white" onclick="onSearch()" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('slider.create') }} " class="btn btn-success float-right m-2">Thêm</a>
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
                            @if (!$sliders->isEmpty())
                                @foreach ($sliders as $slider)
                                    <tr>

                                        <td class="text-capitalize">{{ $slider->name }}</td>

                                        <td>
                                            <img class="slider-image-thumb" src="{{ $slider->photo_path }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"
                                                class="btn btn-default">Sửa</a>
                                            <a href=" "
                                                data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                                class="btn btn-danger action_delete">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach 
                            @else
                                <td colspan="2">Không tìm thấy kết quả!</td>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{$sliders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
