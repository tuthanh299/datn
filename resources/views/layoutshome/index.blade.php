<!DOCTYPE html>
<html lang="en">

<head>
    @include('partialshome.head')
    @include('partialshome.css')
</head>

<body>
    <div class="wrap-container">
        <!-- Header -->
        @include('partialshome.header')
        <!-- Menu -->
        @include('partialshome.menu')
        <!-- Slider -->
        @include('partialshome.slider')
        <!-- Content -->
        @include('partialshome.content')

        <!-- Footer -->
        @include('partialshome.footer')
        @include('partialshome.support')
        @include('partialshome.anticopy')
        @include('partialshome.js')
    </div>
</body>

</html>