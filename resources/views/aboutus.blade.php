@extends('layouts.default')

@section('content')
    <section>

        <ul class="breadcrumbs container">
            <li><a href="#">Главная</a></li>
            <li><a href="#">aboutus</a></li>
        </ul>

        <h1 class="h2 title-margin container">Сведения <br class="mob-br">об образовательной организации</h1>

        <div class="maininfo-block page-margin-container container">
            <ul class="maininfo-list">
                <li>
                    <div class="maininfo-button"><a href="#">Основные сведения</a></div>

                    <!-- Container for content by click only on mobile -->
                    <div class="maininfo-block-content">
                        <div>
                            <h2 class="h3 maininfo-subtitle">Основные сведения</h2>

                            <ul class="maininfo-columns maininfo-margin">

                                <li class="contacts-block">
                                    <div class="contacts-name">
                                        Дата создания
                                        <svg>
                                            <use href='#dataIcon'></use>
                                        </svg>
                                    </div>

                                    <div class="contacts-desc text-2">
                                        Казанский гуманитарно-технический колледж (КГТК) был создан 03 февраля 2015 года
                                    </div>
                                </li>

                                <li class="contacts-block">
                                    <div class="contacts-name">
                                        учредитель
                                        <svg>
                                            <use href='#personIcon'></use>
                                        </svg>
                                    </div>

                                    <div class="contacts-desc text-2">
                                        Общество с ограниченной ответственностью Информационно-консультационный центр
                                        «Дидактинформ»
                                    </div>
                                </li>

                                <li class="contacts-block">
                                    <div class="contacts-name">
                                        местонахождение
                                        <svg>
                                            <use href='#pointIcon'></use>
                                        </svg>
                                    </div>

                                    <div class="contacts-desc text-2">
                                        420073 Республика Татарстан, г. Казань ул. Гвардейская д. 33, 4 этаж
                                    </div>
                                </li>

                                <li class="contacts-block">
                                    <div class="contacts-name">
                                        график работы
                                        <svg>
                                            <use href='#timeIcon'></use>
                                        </svg>
                                    </div>

                                    <div class="contacts-desc text-2">
                                        С пн по пт: 8:30 — 17:00
                                        <br><br class="desctop-br">
                                        Обед: 12:00 — 12:30
                                        <br><br class="desctop-br">
                                        Сб, вс — выходной
                                    </div>
                                </li>

                                <li class="contacts-block">
                                    <div class="contacts-name">
                                        Контакты
                                        <svg>
                                            <use href='#phoneIcon'></use>
                                        </svg>
                                    </div>

                                    <div class="contacts-desc text-2">
                                        Почта: <a href="mailto:kazangtk@mail.ru">kazangtk@mail.ru</a>
                                        <br><br>
                                        Телефоны:
                                        <br><a href="tel:+78432285269">+7(843)228-52-69</a>
                                        <br><a href="tel:+78432285277">+7(843)228-52-77</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Структура и органы управления</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Документы</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Образование</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Образовательные стандарты и требования</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Руководство. Педагоги</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Материально-техническое обеспечение</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Стипендии и меры поддержки обучающихся</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Платные образовательные услуги</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Финансово-хозяйственная деятельность</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Вакантные места для приема (перевода) обучающихся</a>
                    </div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Доступная среда</a></div>
                </li>
                <li>
                    <div class="maininfo-button"><a href="#">Международное сотрудничество</a></div>
                </li>
            </ul>

            <!-- Container for content by click only on desctop-->
            <div class="maininfo-content">

            </div>
        </div>
    </section>
@endsection
