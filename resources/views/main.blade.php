@extends('layouts.default')

@section('title', __('messages.name.end'))

@section('content')
    @include('main.mainBlock')

    <section class="container page-margin">
        <h2 class="h2">Преимущества</h2>

        <ul class="advantages-list page-margin-container">
            @foreach ($preferences as $item)
                <li class="advantages-item">
                    <h3 class="text-button mob-brblock">{{$item->name}}</h3>
                    <div>{{$item->description}}</div>
                </li>
            @endforeach
            <li class="advantages-item">
                <h3 class="text-button mob-brblock">Возможность<br> дистанционного обучения</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
            <li class="advantages-item">
                <h3 class="text-button mob-brblock">поступление<br> без Вступительных испытаний </h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
            <li class="advantages-item">
                <h3 class="text-button advantages-title">оплата обучения <br>любым способом</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
        </ul>
    </section>

    <section class="container page-margin">
        <ul class="licence-list">
            <li class="licence-item">
                <h2 class="h2">Лицензия</h2>

                <div class="licence-item__block page-margin-container">
                    <div class="licence-item__img img-contain">
                        <img src="/images/licence/licence-1.jpg" alt="licence">
                    </div>
                    <div class="licence-item__text">Государственная лицензия на осуществление образовательной деятельности
                        выдана
                        Департаментом образования города Москвы. Регистрационный номер лицензии <br> 16Л01 № 0003558 рег. №
                        7601 от
                        10.12.2015 Документ подтверждает право КГТК на образовательную деятельность.</div>
                </div>
            </li>
            <li class="licence-item">
                <h2 class="h2">Аккредитация</h2>

                <div class="licence-item__block page-margin-container">
                    <div class="licence-item__img img-contain">
                        <img src="/images/licence/licence-1.jpg" alt="licence">
                    </div>
                    <div class="licence-item__text">Государственная аккредитация образовательной деятельности подтверждает
                        соответствия реализуемых основных образовательных программ и подготовки обучающихся требованиям
                        федеральных
                        государственных образовательных стандартов.</div>
                </div>
            </li>
        </ul>
    </section>

    <section class=" page-margin">
        <div class="news-top container">
            <h2 class="h2">Новости</h2>

            <a href="{{ route('articles') }}" class="news-button">
                <span class="text-button text-green">все новости</span>
                <span class="arrow-button"><svg>
                        <use href='#arrowR'></use>
                    </svg></span>
            </a>
        </div>

        <div class="swiper news-swiper page-margin-container container">
            <ul class="news-list swiper-wrapper">
                <li class="news-item swiper-slide">
                    <a href="#">
                        <span class="img-cover rounded news-img"><img src="/images/news/news-1.jpg" alt="news"></span>
                        <span class="news-title h4">Колледж стал лидером в области цифровых технологий</span>
                        <span class="news-desc text-2">Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies
                            bibendum dolor
                            suscipit. </span>
                    </a>
                </li>
                <li class="news-item swiper-slide">
                    <a href="#">
                        <span class="img-cover rounded news-img"><img src="/images/news/news-2.jpg" alt="news"></span>
                        <span class="news-title h4">Колледж запускает новые программы обучения</span>
                        <span class="news-desc text-2">Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies
                            bibendum dolor
                            suscipit. </span>
                    </a>
                </li>
                <li class="news-item swiper-slide">
                    <a href="#">
                        <span class="img-cover rounded news-img"><img src="/images/news/news-3.jpg" alt="news"></span>
                        <span class="news-title h4">Инновационные методы обучения для повышения качества образования</span>
                        <span class="news-desc text-2">Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies
                            bibendum dolor
                            suscipit. </span>
                    </a>
                </li>
                <li class="news-item swiper-slide">
                    <a href="#">
                        <span class="img-cover rounded news-img"><img src="/images/news/news-4.jpg" alt="news"></span>
                        <span class="news-title h4">Наши студенты получили престижные награды на конкурсе</span>
                        <span class="news-desc text-2">Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies
                            bibendum dolor
                            suscipit. </span>
                    </a>
                </li>
            </ul>
        </div>
    </section>


    <section class="container page-margin">
        <h2 class="h2">Учиться у нас</h2>

        <ul class="advantages-list page-margin-container">
            <li class="advantages-item">
                <h3 class="text-button">поступление</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
            <li class="advantages-item">
                <h3 class="text-button">дистанционное обучение</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
            <li class="advantages-item">
                <h3 class="text-button">заочное обучение</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
            <li class="advantages-item">
                <h3 class="text-button">занятия</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
            <li class="advantages-item">
                <h3 class="text-button">Сессии</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
            <li class="advantages-item">
                <h3 class="text-button">каникулы</h3>
                <div>Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim
                    facilisis
                    condimentum nisi maecenas viverra pellentesque.</div>
            </li>
        </ul>
    </section>

    <section class="page-margin textus">

        <div class="img-cover textus-img">
            <img src="/images/main/main-2.jpg" alt="main">
        </div>

        <div class="container textus-form">
            <div class="form-container">
                <h2 class="h3 form-title">Напишите нам!</h2>
                <form action="#" class="form-container__form">
                    <div class="input-wrapper">
                        <input type="text" name="name" class="input form-container__input" required>
                        <div class="input-placeholder">Имя и фамилия</div>
                    </div>
                    <div class="input-wrapper">
                        <input type="tel" name="tel" class="input form-container__input" required>
                        <div class="input-placeholder">Телефон</div>
                    </div>

                    <label class="input-checkbox-wrapper">
                        <input type="checkbox" required>
                        <span class="input-checkbox"><svg>
                                <use href='#checkboxIcon'></use>
                            </svg></span>
                        <span class="text-3 form-agreetext">Согласен на обработку персональных данных, получение рассылок,
                            а также <br>с <button type="button" class="page-link" data-modal="#policy">Политикой
                                конфиденциальности</button>.</span>
                    </label>

                    <button class="page-button">Оставить заявку</button>
                </form>
            </div>
        </div>
    </section>

    <section class="teachers page-margin">
        <div class="page-justify container">
            <h2 class="h2">Наши преподаватели</h2>
            <div class="page-buttons teachers-buttons">
                <button class="arrow-button prev">
                    <svg>
                        <use href='#arrowL'></use>
                    </svg>
                </button>
                <button class="arrow-button next">
                    <svg>
                        <use href='#arrowR'></use>
                    </svg>
                </button>
            </div>
        </div>

        <div class="teachers-container page-margin-container container">
            <div class="teachers-block h3">
                <span class="teachers-red">15+ </span>преподавателей <br>в колледже
            </div>
            <div class="swiper teachers-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="teachers-img img-cover">
                            <img src="/images/teachers/teachers-1.jpg" alt="teacher">
                        </div>
                        <div class="h4 teachers-name">Васильев Андрей Федорович </div>
                        <div class="teachers-type mob-text-2">бухгалтерский учет</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="teachers-img img-cover">
                            <img src="/images/teachers/teachers-2.jpg" alt="teacher">
                        </div>
                        <div class="h4 teachers-name">Ярцева Инга Ивановна</div>
                        <div class="teachers-type mob-text-2">бухгалтерский учет</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="teachers-img img-cover">
                            <img src="/images/teachers/teachers-3.jpg" alt="teacher">
                        </div>
                        <div class="h4 teachers-name">Светленко Анна Николаевна</div>
                        <div class="teachers-type mob-text-2">бухгалтерский учет</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="teachers-img img-cover">
                            <img src="/images/teachers/teachers-4.jpg" alt="teacher">
                        </div>
                        <div class="h4 teachers-name">Галиахметова Татьяна Викторовна</div>
                        <div class="teachers-type mob-text-2">Старший менеджер</div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="reviews page-margin">
        <div class="page-justify container">
            <h2 class="h2 text-white">Отзывы студентов</h2>
            <div class="page-buttons reviews-buttons">
                <button class="arrow-button --white prev">
                    <svg>
                        <use href='#arrowL'></use>
                    </svg>
                </button>
                <button class="arrow-button --white next">
                    <svg>
                        <use href='#arrowR'></use>
                    </svg>
                </button>
            </div>
        </div>

        <div class="reviews-container page-margin-container container">
            <div class="reviews-block">
                Более 2000 студентов окончили наш колледж. <br> Послушайте, что они говорят!
            </div>
            <div class="swiper reviews-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="reviews-text">
                            Я учусь в Казанском гуманитарно-техническом колледже уже третий год и могу сказать, что это один
                            из лучших
                            колледжей в городе. Преподаватели очень квалифицированные и всегда готовы помочь студентам. В
                            колледже есть
                            много интересных кружков и мероприятий, которые помогают развивать не только профессиональные,
                            но и
                            личностные качества.
                        </div>
                        <h3 class="reviews-name h4">Марина Зайцева, выпускник</h3>
                        <div class="reviews-type text-2">Экономика и бухгалтерский учёт</div>
                    </div>

                    <div class="swiper-slide">
                        <div class="reviews-text">
                            Я учусь в Казанском гуманитарно-техническом колледже уже третий год и могу сказать, что это один
                            из лучших
                            колледжей в городе. Преподаватели очень квалифицированные и всегда готовы помочь студентам. В
                            колледже есть
                            много интересных кружков и мероприятий, которые помогают развивать не только профессиональные,
                            но и
                            личностные качества.
                        </div>
                        <h3 class="reviews-name h4">Марина Зайцева, выпускник</h3>
                        <div class="reviews-type text-2">Экономика и бухгалтерский учёт</div>
                    </div>

                    <div class="swiper-slide">
                        <div class="reviews-text">
                            Очень довольна своим выбором - учиться в Казанском гуманитарно-техническом колледже. Колледж
                            предоставляет
                            отличные условия для обучения, современное оборудование и квалифицированных преподавателей.
                            Очень радует,
                            что в колледже есть возможность проходить практику в ведущих компаниях города.
                        </div>
                        <h3 class="reviews-name h4">Марина Зайцева, выпускник</h3>
                        <div class="reviews-type text-2">Экономика и бухгалтерский учёт</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="page-buttons reviews-buttons-bot container">
            <button class="arrow-button --white prev">
                <svg>
                    <use href='#arrowL'></use>
                </svg>
            </button>
            <button class="arrow-button --white next">
                <svg>
                    <use href='#arrowR'></use>
                </svg>
            </button>
        </div>
    </section>

    <section class="page-margin container partners">
        <h2 class="h2 partners-title">Партнеры</h2>

        <div class="partners-wrapper">

            <div class="swiper-arrows">
                <button class="arrow-button prev">
                    <svg>
                        <use href='#arrowL'></use>
                    </svg>
                </button>
                <button class="arrow-button next">
                    <svg>
                        <use href='#arrowR'></use>
                    </svg>
                </button>
            </div>

            <div class="swiper partners-swiper page-margin-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-1.jpg" alt="partners">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-2.jpg" alt="partners">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-3.jpg" alt="partners">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-4.jpg" alt="partners">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-1.jpg" alt="partners">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-2.jpg" alt="partners">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-3.jpg" alt="partners">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/partners/partners-4.jpg" alt="partners">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
