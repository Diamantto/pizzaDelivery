<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <title>Pizza</title>

    @yield('style')

</head>
<body>
<header class="pc">
    <div class="left">
        <img src="{{ asset('img/logo.png') }}" alt="" class="logo"
             onclick="document.location.href = 'http://pizza.apeps.pp.ua'">
        <div onclick="document.location.href = 'http://pizza.apeps.pp.ua/restaurant'">
            <img src="{{ asset('img/layout/rest.png') }}" alt="">
            <p>Ресторани</p>
        </div>
        <div onclick="document.location.href = 'http://pizza.apeps.pp.ua/delivery'">
            <img src="{{ asset('img/layout/del.png') }}" alt="">
            <p>Доставка</p>
        </div>
    </div>
    <div class="right">
        <div>(044) 222-44-44</div>
        @if(request()->cookie('name') === null)
            <div class="log" onclick="document.location.href= 'http://pizza.apeps.pp.ua/login'">Аккаунт</div>
        @else
            <div class="log"
                 onclick="document.location.href= 'http://pizza.apeps.pp.ua/exit'">{{request()->cookie('name')}}</div>
        @endif
        <div class="box" onclick="document.location.href = 'http://pizza.apeps.pp.ua/delivery/box'">Корзина</div>
    </div>
</header>
<header class="phone">
    <div class="left">
        <div class="drop-menu">
            <div class="click-menu">
                <img src="{{asset('img/layout/menu.png')}}" alt="">
            </div>
            <div class="menu">
                <a href="/delivery/pizza">Піцца</a>
                <a href="/delivery/snack">Закуски</a>
                <a href="/delivery/salad">Салати</a>
                <a href="/delivery/main">Основні</a>
                <a href="/delivery/dessert">Десерти</a>
                <a href="/delivery/drink">Напої</a>
                @if(request()->cookie('name') === null)
                    <a href="/login" style="background-color: #ffb718;color: black;">Логін</a>
                    <a href="/reg" style="background-color: #ffb718; color: black;">Реєстрація</a>
                @else
                    <a href="/exit" style="background-color: #ffb718; color: black;">Вийти</a>
                @endif
            </div>
        </div>
        <p>PIZZA</p>
    </div>
    <img src="{{asset('img/layout/box.png')}}" alt="" class="bin" onclick="document.location.href='http://pizza.apeps.pp.ua/delivery/box';">
</header>
<div class="postheader">
    <div>
        <p class="nav">Піца</p>
        <p class="nav">Закуски</p>
        <p class="nav">Салати</p>
        <p class="nav">Основні</p>
        <p class="nav">Десерти</p>
        <p class="nav">Напої</p>
    </div>
</div>
<div class="postheader-phone">
    <a href="/restaurant">Ресторани</a>
    <a href="/delivery">Доставка</a>
</div>

@yield('main')

<footer>
    <div>
        <img src="{{ asset('img/layout/inst.png') }}" alt="">
        <img src="{{ asset('img/layout/yt.png') }}" alt="">
        <img src="{{ asset('img/layout/fb.png') }}" alt="">
    </div>
    <div>
        <img src="{{ asset('img/logo.png') }}" alt="">
        <div>
            <p>Ресторани</p>
            <p>Доставка</p>
        </div>
    </div>
    <div>
        <p>Підтримувані платежі</p>
        <img src="{{ asset('img/layout/pl.png') }}" alt="">
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('js/server.js')}}"></script>
<script src="{{asset('js/cookie.js')}}"></script>
<script>
    let html = 'Корзина';
    if (JSON.parse(getCookie('order')) !== null && JSON.parse(getCookie('order')).count !== 0) {
        html += ' (' + JSON.parse(getCookie('order')).count + ')';
    }
    document.querySelector('.box').innerHTML = html;

    document.querySelector('.click-menu').addEventListener('click', () => {
        if(document.querySelector('.click-menu').classList.contains('active')){
            document.querySelector('.click-menu').classList.remove('active');
            document.querySelector('.menu').style.display = 'none';
        }
        else{
            document.querySelector('.click-menu').classList.add('active');
            document.querySelector('.menu').style.display = 'grid';
        }
    })
</script>

@yield('script')

</body>
</html>
