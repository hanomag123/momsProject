@extends('layouts.default')

@section('title', __('messages.name.end'))

@section('content')
    <section class="container">

        <x-breadcrumbs cur="{{ $article->title }}" :pages="[
            [
                'href' => 'articles',
                'text' => 'Новости',
            ],
        ]" />

        <h1 class="h2 title-margin">{{ $article->title }}</h1>

        <div class="new-container page-margin-container">
            <figure><img src="{{$article->article->image}}" alt="news"></figure>

            {!! $article->content !!}

        </div>
    </section>
@endsection
