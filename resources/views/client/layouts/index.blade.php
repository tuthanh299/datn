<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.partials.head')
    @include('client.partials.css')
</head>

<body>
    <div class="wrap-container">
        <!-- Header -->
        @include('client.partials.header')
        <!-- Menu -->
        @include('client.partials.menu')
        <!-- Slider -->
        @include('client.partials.slider')
        <!-- Content -->
        @include('client.partials.content')

        <!-- Footer -->
        @include('client.partials.footer')
        @include('client.partials.modal')
        @include('client.partials.support')
        @include('client.partials.anticopy')
        @include('client.partials.js')
    </div>
</body>

</html>