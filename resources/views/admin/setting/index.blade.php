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
    @include('partials.content-header', ['name' => 'Settings', 'key' => 'List'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Zalo</th>
                                <th>Address</th>
                                <th>Fanpage</th>
                                <th>Website</th>
                                <th>Link Map</th>
                                <th>Iframe Map</th>
                                <th>Logo Path</th>
                                <th>Logo Name</th>
                                <th>Favicon Path</th>
                                <th>Favicon Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ $setting->id }}</td>
                                    <td>{{ $setting->name }}</td>
                                    <td>{{ $setting->description }}</td>
                                    <td>{{ $setting->phone }}</td>
                                    <td>{{ $setting->email }}</td>
                                    <td>{{ $setting->zalo }}</td>
                                    <td>{{ $setting->address }}</td>
                                    <td>{{ $setting->fanpage }}</td>
                                    <td>{{ $setting->website }}</td>
                                    <td>{{ $setting->link_map }}</td>
                                    <td>{{ $setting->iframe_map }}</td>
                                    <td>{{ $setting->logo_path }}</td>
                                    <td>{{ $setting->logo_name }}</td>
                                    <td>{{ $setting->favicon_path }}</td>
                                    <td>{{ $setting->favicon_name }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
