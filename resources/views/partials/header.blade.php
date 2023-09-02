<header class="header">

  <a href="{{route('main')}}" class="header__logo-container"> 
    <div class="header__logo">
      <img src="{{url('/images/logo/logo.png')}}" alt="logo">
    </div>
    <div class="h4">
      <div>@lang('messages.name.start')</div>
      <div>@lang('messages.name.end')</div>
    </div>
  </a>

  @include('partials.menu')

  <button class="menu-button">
    <span class="burger-button-close">
      <span id="first-line-burger"></span>
      <span id="second-line-burger"></span>
      <span id="third-line-burger"></span>
    </span>
  </button>
</header>