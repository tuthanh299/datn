<div class="slideshow">
   
    <div class="slick-slideshow">
        @foreach ($sliders as $v)
        <div class="slideshow-item" owl-item-animation>
            <a class="slideshow-image" href=" " target="_blank" title=" ">
                <img class="w-100" width="1366" height="400" src="{{$v->photo_path }}" alt>
            </a>
        </div>
        @endforeach
       
         
    </div>

</div>