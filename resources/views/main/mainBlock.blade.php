
<section>
  <div class="main-block">
      <div class="main-block-left container">

          <h1 class="main-block-title text-white">{{$mainBlock->title}}</h1>
          <div class="main-block-text text-white">{{$mainBlock->intro}}</div>

      </div>
      <div class="main-block-right img-cover">
        @if ($mainBlock->image)
          <img src="{{url($mainBlock->image->url)}}" alt="main">
        @endif
          
      </div>
  </div>

  @include('form.form')
  
</section>
