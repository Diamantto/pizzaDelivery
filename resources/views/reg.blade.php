@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/reg.css')}}">
@endsection

@section('main')
    <div class="content">
        <form action="/reg" method="post">
            @csrf
            <h2>Реєстрація</h2>
            <input type="text" name="name" placeholder="Ім'я" required>
            <input type="text" name="surname" placeholder="Прізвище" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="phone" placeholder="Телефон" required>
            <input type="password" name="pas1" placeholder="Пароль" required>
            <input type="password" name="pas2" placeholder="Пароль повторно" required>
            <div class="ttt">Адреса доставки у києві</div>
            <input type="text" name="street" placeholder="Вулиця" required>
            <div class="tab">
                <input type="text" name="house" placeholder="Будинок" required>
                <input type="text" name="entrance" placeholder="Під'їзд" required>
                <input type="text" name="flat" placeholder="Квартира" required>
                <input type="text" name="floor" placeholder="Поверх" required>
            </div>
            <div class="gr">
                <input type="checkbox" name="check" class="check">
                <label for="check">Підписатися на розсилку пропозицій PIZZA</label>
            </div>

            <button type="submit" class="btn" disabled>Зареєструватися</button>
        </form>

        <div class="login">
            Я вже зареєстрований(а) - <a href="/login">Увійти</a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let t = document.querySelector('.postheader').querySelectorAll('.nav');
        let t1 = ['pizza', 'snack', 'salad', 'main', 'dessert', 'drink'];

        for (let i = 0; i < t.length; i++) {
            t[i].addEventListener('click', () => {
                document.location.href = "http://pizza.apeps.pp.ua/delivery/" + t1[i];
            })
        }

        let btn = document.querySelector('.btn');
        let ch = document.querySelector('.check');
        setInterval( ()=>{
            btn.disabled = !ch.checked;
        }, 100);

        btn.addEventListener('mouseenter', () => {
            btn.style.backgroundColor = '#ffb718';
            btn.style.color = 'black';
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.backgroundColor = 'transparent';
            btn.style.color = '#ffb718';
        });
    </script>
@endsection
