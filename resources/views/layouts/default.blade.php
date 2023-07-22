<!DOCTYPE html>
<html lang="ru">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.sprite')

    <!-- Preloader-->

    <div class="preloader" id="preloader">
        <div class="spin">
            <div class="lds-ring"><div></div><div></div><div></div><div class="logo"><img src="/images/logo/logo.png" alt="logo"></div></div>
        </div>
    </div>

    <div class="page">
        
        <!-- Header -->

        @include('partials.header')

        <!-- Main content -->
        <main>

            @section('content')
                
            @show

        </main>

        <!-- To Top Button-->
        <button class="to-top-button"><svg><use href='#arrowL'></use></svg></button>

        <!-- Footer -->
        @include('partials.footer')

        <!-- Policies-->
        @include('partials.policy')

    </div>

    <!-- JS -->
    @vite(['resources/js/main.js', 'resources/js/vendor.js'])

    <script>
        window.onload = function() { preloader.style.opacity = "0"; setTimeout(() => preloader.style.display = 'none', 300);}
    </script>
</body>

</html>