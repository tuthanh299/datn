<?php
use App\Http\Controllers\Clients\IndexController;
?>

@extends('client.layouts.index')
@section('title')
    <title>{{ IndexController::settings()->name }}</title>
@endsection
@section('content')
    @include('client.partials.content')
@endsection
