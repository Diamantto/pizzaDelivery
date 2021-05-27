@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/del.css')}}">
@endsection

@section('main')
    <div class="content">
        <h1>Доставка</h1>
        <div class="gr">
            @if(request()->cookie('name') !== null)
                <button class="btn">Я постійний клієнт</button>
            @else
                <button class="btn">Я новий клієнт</button>
                <button class="btn">Я постійний клієнт</button>
            @endif
        </div>
        <form action="/delivery/del" method="post">
            @csrf
            @if(request()->cookie('name') === null)
                <div class="us">
                    <input type="text" name="name" placeholder="Ваше ім'я" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="text" name="phone" placeholder="Номер телефону" required>
                </div>
                <hr>
            @endif
            <p class="first-p">Доставка (безкоштовно за адресою від 150 грн)</p>
            <div class="rat">
                <label>
                    <input type="radio" name="del" value="add" id="add" checked>
                    Доставка за адресою
                </label>
                <label>
                    <input type="radio" name="del" value="self" id="self">
                    Самовивіз
                </label>
            </div>
            <hr>
            <p>Адреса доставки у києві</p>
            <div class="ad">
                @if(request()->cookie('name') === null)
                    <input type="text" name="street" placeholder="Вулиця" required>
                    <input type="text" name="house" placeholder="Будинок" required>
                    <input type="text" name="entrance" placeholder="Під'їзд" required>
                    <input type="text" name="flat" placeholder="Квартира" required>
                    <input type="text" name="floor" placeholder="Поверх" required>
                @else
                    <input type="text" name="street" placeholder="Вулиця" value="{{$user->street}}" required>
                    <input type="text" name="house" placeholder="Будинок" value="{{$user->house}}" required>
                    <input type="text" name="entrance" placeholder="Під'їзд" value="{{$user->entrance}}" required>
                    <input type="text" name="flat" placeholder="Квартира" value="{{$user->flat}}" required>
                    <input type="text" name="floor" placeholder="Поверх" value="{{$user->floor}}" required>
                @endif
            </div>
            <hr>
            <p>Оплата</p>
            <div class="rat">
                <label>
                    <input type="radio" name="opl" value="cash" id="m" checked>
                    Готівкою
                </label>
                <label>
                    <input type="radio" name="opl" value="card" id="c">
                    Карткою
                </label>
            </div>
            <button type="submit">Замовити</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/del.js')}}"></script>
    <script>
        let t = document.querySelector('.postheader').querySelectorAll('.nav');
        let t1 = ['pizza', 'snack', 'salad', 'main', 'dessert', 'drink'];

        for (let i = 0; i < t.length; i++) {
            t[i].addEventListener('click', () => {
                document.location.href = "http://pizza.apeps.pp.ua/delivery/" + t1[i];
            })
        }
    </script>
@endsection
