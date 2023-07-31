@extends('layouts.default')

@section('title', __('messages.name.end'))

@section('content')
    <section class="container">

        <ul class="breadcrumbs">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Колледж стал лидером в области цифровых технологий</a></li>
        </ul>

        <h1 class="h2 title-margin">Колледж стал лидером в области цифровых технологий</h1>

        <div class="new-container page-margin-container">

            {!!$article->content!!}
            <figure><img src="./assets/images/news/news-1.jpg" alt="news"></figure>

            <h3>Lorem ipsum dolor sit amet.</h3>

            <p>Lorem ipsum dolor sit amet consectetur. Tempus magna mauris id magna netus posuere felis. Nunc dui vulputate
                nisi aliquam tortor quam vitae. Nibh sem massa ultricies ultrices. Elementum ut tempus accumsan eget nam
                sodales. Fermentum mauris urna lectus augue pharetra condimentum. Enim quis nisi convallis sapien platea
                aenean risus. Donec dolor viverra urna tempus semper vestibulum duis.</p>
            <p>Nibh blandit iaculis massa habitant sit odio duis eget ullamcorper. Ullamcorper fusce mi vulputate sit elit
                arcu nunc. Sit donec bibendum fermentum odio nibh molestie arcu dictum odio. Arcu est mi amet ut. Gravida
                amet morbi justo euismod nisi vehicula et nisi suspendisse. Nisi faucibus faucibus vestibulum quis quis sit
                volutpat lorem tincidunt. Diam quis luctus pretium amet ipsum et egestas. Massa ut quis quis mi. Odio ut
                ornare vitae sagittis eget pellentesque viverra tellus pretium. Sit vulputate tellus nibh lacinia
                pellentesque pretium.</p>
            <p>Mattis volutpat mattis nisl nullam. Mattis tortor non facilisi at blandit. Viverra ac faucibus pharetra netus
                facilisi amet maecenas. Risus amet cras nulla nibh aliquam eget tristique ut. Dictumst lorem commodo in ac
                adipiscing ultrices egestas. Vestibulum ultricies elementum faucibus pellentesque semper varius.
                Pellentesque est mi eget libero luctus tristique. Sit elementum magna eleifend mattis odio enim vestibulum
                urna faucibus. Malesuada magna in et eget faucibus vestibulum lacus senectus tellus. Sit eu posuere nibh
                urna eu ultrices. Bibendum erat cras posuere sed imperdiet fames vitae. Senectus neque sollicitudin
                pellentesque diam.</p>
        </div>
    </section>
@endsection
