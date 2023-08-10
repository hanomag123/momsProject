<div class="menu">

    <div class="menu__top-logo"></div>

    <div class="menu__list">
        <ul class="menu-list">
            <li><a href="https://yandex.by/maps/-/CPW0Vjq" target="_blank" class="text-3 text-green">@lang('messages.address')</a>
            </li>
            <li><a href="mailto:ddu10@minskedu.gov.by" class="text-3 text-green">ddu10@minskedu.gov.by</a></li>
        </ul>
    </div>

    <div class="eye-button-wrapper">
        <a href="#" class="eye-button">
            <svg>
                <use href='#eyeIcon'></use>
            </svg>
            @lang('messages.eye')
        </a>
    </div>
    <div class="menu__contacts">

        <a href="tel:+375173974015" class="header__link h4 text-black">+375173974015</a>

        @if (App::isLocale('ru'))
            <a href="{{ route('setLocale', ['locale' => 'by']) }}" class="header__link h4 text-black">Бел</a>
        @else
            <a href="{{ route('setLocale', ['locale' => 'ru']) }}" class="header__link h4 text-black">Ру</a>
        @endif

    </div>


    <nav class="menu__bottom container">
        <ul>
            @foreach ($navbars as $item)
            <li><a href="{{ route($item->route) }}">{{$item->name}}</a></li>
            @endforeach
            {{-- <li class="active"><a href="#">Сведения об<br>образовательной организации</a></li>
            <li><a href="#">Специальности</a></li>
            <li><a href="#">Абитуриентам</a></li>
            <li><a href="#">Студентам</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Контакты</a></li> --}}
        </ul>
    </nav>
</div>
