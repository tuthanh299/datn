<!DOCTYPE html>
<html lang="vn">
<!-- Head -->

@include ('index_partials.head') 
<!-- Body -->

<body>
    <div class="containerr">
        <div class="main">

            <!-- Header -->
            @include ('index_partials.header')
            <!-- Menu  -->
            @include ('index_partials.menu')
			
			<!--Main content-->

            @yield('content')

            <!-- Footer -->
            @include ('index_partials.footer')  
        </div>
    </div>
</body>

@include ('index_partials.js')

</html>