@extends('client.layouts.index')

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                Tin tức & sự kiện
            </span>
        </div>
        <div class="content-main">
            @isset($newsInternal)
                @if (!$newsInternal->isEmpty())
                    <div class="grid-news-internal">
                        @foreach ($newsInternal as $v)
                            <div class="news-box-in" data-aos="fade-up" data-aos-duration="1000">
                                <a href="{{ route('news.detail', ['id' => $v->id]) }}">
                                    <div class="news-box-in-img scale-img hover_light">
                                        <img src="{{ $v->photo_path }}" alt="{{ $v->name }}" class="w-100">
                                    </div>
                                    <div class="news-box-ex-info">
                                        <div class="news-box-ex-name text-split-2"> {{ $v->name }}</div>
                                        <div class="news-box-ex-desc text-split-3">{!! $v->description !!}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning w-100">
                        <strong>Dữ liệu đang được cập nhật.</strong>
                    </div>
                @endif
            @endisset
        </div>
    </div>
@endsection
