@extends('layouts.default')

@section('title', __('messages.name.end'))

@section('content')
    <section class="container">

        <ul class="breadcrumbs">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Новости</a></li>
        </ul>

        <h1 class="h2 title-margin">Новости</h1>

        <ul class="news-list page-margin-container">

            @foreach ($articles as $key => $article)
                @isset($article, $article->slug)
                    <li class="news-item">
                        <a href="{{ route('article', $article->slug) }}">
                            @isset ($images[$key])
                                <div class="img-cover rounded news-img"><img src="{{ $images[$key] }}" alt="news"></div>
                            @endisset
                            <div class="news-title h4">{{ $article->title }}</div>
                            <div class="news-desc text-2">{!! $article->content !!}</div>
                        </a>
                    </li>
                @endisset
            @endforeach

            <li class="news-item --wider">
                <a href="#">
                    <span class="img-cover rounded news-img"><img src="./assets/images/news/news-1.jpg"
                            alt="news"></span>
                    <span class="news-title h4">Колледж стал лидером в области цифровых технологий</span>
                    <span class="news-desc text-2">Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies
                        bibendum dolor
                        suscipit. </span>
                </a>
            </li>
        </ul>
        {{$paginate->links()}}
    </section>
@endsection
