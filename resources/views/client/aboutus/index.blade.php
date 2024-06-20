@extends('client.layouts.index')

@section('title')
    <title>Về chúng tôi</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                {{ $pageName }}
            </span>
        </div>
        <div class="content-main">
            {!! $aboutusin !!}
        </div>
    </div>
@endsection
