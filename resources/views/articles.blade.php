@extends('layouts.default')

@section('title', __('messages.name.end'))

@section('content')
    <section class="container">

        <x-breadcrumbs cur="Новости" :pages="[
                // [
                //   'href' => '#',
                //   'text' => 'Components',
                // ]
            ]" />

        <h1 class="h2 title-margin">Новости</h1>

        <form action="{{ route('articles') }}" class="articles-form" id="filter-form">

            <div class="custom-select w-full">
                <select name="year">
                    <option value="">@lang('messages.year')</option>
                    @foreach (range(date('Y'), $minYear[0]) as $year)
                        <option value="{{ $year }}"
                            @isset($_GET['year']) @if ((int) $_GET['year'] === $year) selected @endif @endisset>
                            {{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="custom-select w-full">
                <select name="month">
                    <option value="">@lang('messages.month')</option>
                    @foreach (__('messages.monthes') as $key => $month)
                        <option value="{{ $key + 1 }}"
                            @isset($_GET['month']) @if ((int) $_GET['month'] === $key + 1) selected @endif @endisset>
                            {{ $month }}</option>
                    @endforeach
                </select>
            </div>

            <button class="page-button" type="submit">
                Поиск
            </button>
        </form>

        <ul class="news-list page-margin-container">
            @if (count($articles) > 0)
                @foreach ($articles as $key => $article)
                    @isset($article, $article->slug)
                        <li class="news-item">
                            <a href="{{ route('article', $article->slug) }}">
                                <div class="h5">{{ $article->date }}</div>

                                @isset($article->image)
                                    @if (count($article->previewBlog) > 0)
                                        <div class="img-cover rounded news-img">
                                            <picture>
                                                <source srcset="{{ $article->previewBlog['@1x'] }}" media="(max-width:500px)">
                                                <img src="{{ $article->previewBlog['@2x'] }}" alt="{{ $article->title }}">
                                            </picture>
                                        </div>
                                    @else
                                        <div class="img-cover rounded news-img"><img src="{{ $article->image }}"
                                                alt="{{ $article->title }}"></div>
                                    @endif
                                @endisset

                                <div class="news-title h4">{{ $article->title }}</div>
                                <div class="news-desc text-2">{!! $article->content !!}</div>
                            </a>
                        </li>
                    @endisset
                @endforeach
            @else
                <h3>Ничего не найдено...</h3>
            @endif
        </ul>

        <div>
            {{ $paginate->withQueryString()->links('pagination.custom') }}
        </div>

    </section>
@endsection
