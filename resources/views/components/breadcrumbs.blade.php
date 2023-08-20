<ul class="breadcrumbs">
  <li><a href="{{route('main')}}">Главная</a></li>

  @foreach ($pages as $page)
  <li><a href="{{route($page['href'])}}">{{$page['text']}}</a></li>
  @endforeach


  <li><a href="#">{{$cur}}</a></li>
</ul>