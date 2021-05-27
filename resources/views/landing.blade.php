@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/landing.css')}}">
@endsection

@section('main')
    <div class="content">
        <img src="{{asset('img/logo.png')}}" alt="" class="logo">
        <div class="des">
            <div class="na" style="background: url('{{asset('img/landing/rest.png')}}');" onclick="document.location.href='http://pizza.apeps.pp.ua/restaurant'">
                <div class="n">
                    <div class="anim">
                        <p>Ресторани</p>
                    </div>
                </div>
            </div>
            <div class="na" style="background: url('{{asset('img/landing/del.png')}}');" onclick="document.location.href='http://pizza.apeps.pp.ua/delivery'">
                <div class="n">
                    <div class="anim">
                        <p>Доставка</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="why">
            <h3>ЧОМУ САМЕ МИ</h3>
            <div class="why-align">
                <div class="item"><img src="{{asset('img/landing/why1.png')}}" alt="">
                    <p>Тому що - ми смачні. Клієнти, які замовили у нас, повертаються знову і знову</p>
                </div>
                <div class="item"><img src="{{asset('img/landing/why2.png')}}" alt="">
                    <p>Тому що - ми ситні. У нас дуже багато начинки в піці і ролах</p>
                </div>
                <div class="item"><img src="{{asset('img/landing/why3.png')}}" alt="">
                    <p>Тому що - ми швидкі. ми розуміємо, що ви вже зголодніли і дуже поспішаємо до вас</p>
                </div>
                <div class="item"><img src="{{asset('img/landing/why4.png')}}" alt="">
                    <p>Тому що ми дужче від усіх цінуємо і любимо своїх клієнтів</p>
                </div>
            </div>

        </div>

        <h2>Контакти</h2>
        <div class="add">
            <div class="rst"><img src="{{asset('img/landing/add1.png')}}" alt="">
                <p><b>Адреса</b>: вул. Салютна, 2, корпус 3, ЖК Файна Таун</p>
                <p><b>Телефон</b>: (067)-488-66-10</p>
            </div>
            <div class="rst"><img src="{{asset('img/landing/add2.png')}}" alt="">
                <p><b>Адреса</b>: вул. Золотоворітська, 15</p>
                <p><b>Телефон</b>: (067)-657-55-54</p>
            </div>
            <div class="rst"><img src="{{asset('img/landing/add3.png')}}" alt="">
                <p><b>Адреса</b>: пр-т Перемоги, 26, ТРЦ «Smart Plaza»</p>
                <p><b>Телефон</b>: (067)-621-83-30</p>
            </div>
            <div class="rst"><img src="{{asset('img/landing/add4.png')}}" alt="">
                <p><b>Адреса</b>: вул. Набережно-Хрещатицька, 41, БЦ "Астарта" (блок С)</p>
                <p><b>Телефон</b>: (067)-447-99-67</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/landing.js')}}"></script>
@endsection
