<div class="slideshow">

    <div class="slick-slideshow">
        @foreach ($sliders as $v)
            <div class="slideshow-item" owl-item-animation>
                <a class="slideshow-image" target="_blank" title="{{ $v->name }}">
                    <img class="w-100" width="1366" height="400" src="{{ $v->photo_path }}"
                        alt="{{ $v->description }}">
                </a>
            </div>
        @endforeach


    </div>

</div>
