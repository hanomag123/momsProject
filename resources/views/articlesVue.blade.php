@extends('layouts.default')

@section('title', __('messages.name.end'))

@section('content')
    <section class="container">

      <x-breadcrumbs cur="Новости"/>

        <h1 class="h2 title-margin">Новости</h1>

        <div id="vueFilter"></div>
        @vite('resources/js/filter.js')


    </section>
@endsection
