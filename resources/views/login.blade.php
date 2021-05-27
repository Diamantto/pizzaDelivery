@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/reg.css')}}">
    <style>
        footer{
            position: fixed;
            bottom: 0;
        }
    </style>
@endsection

@section('main')
    <div class="content">
        <form action="/login" method="post">
            @csrf
            <h2>Логін</h2>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="pas" placeholder="Пароль" required>

            <button type="submit" class="btn">Увійти</button>
        </form>

        <div class="login">
            Немає аккаунта? - <a href="/reg">Зареєструватися</a>
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
