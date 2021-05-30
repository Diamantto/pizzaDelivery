@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/delivery.css')}}">
@endsection

@section('main')
    <div class="section">
        <div class="pizza">
            <h3>Піца</h3>
            <div class="main-content">
                @foreach($data->where('type','pizza') as $el)
                    <div class="item" id="{{ $el->id }}" onclick="goto('{{$el->type}}', {{$el->id}})">
                        <div class="t" style="background: url('{{asset('img/'.$el->src.'.png')}}');">
                            <div class="desc"><p class="text">{{ $el->desc }}</p></div>
                        </div>
                        <p>{{ $el->name }}</p>
                        <p style="font-weight:bolder;font-size: 20px;margin-top: 0;">{{ $el->price }} грн</p>
                        <div class="btn">В КОРОБКУ</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="snack">
            <h3>Закуски</h3>
            <div class="main-content">
                @foreach($data->where('type','snack') as $el)
                    <div class="item" id="{{ $el->id }}" onclick="goto('{{$el->type}}', {{$el->id - 21}})">
                        <div class="t" style="background: url('{{asset('img/'.$el->src.'.png')}}');">
                            <div class="desc"><p class="text">{{ $el->desc }}</p></div>
                        </div>
                        <p>{{ $el->name }}</p>
                        <p style="font-weight:bolder;font-size: 20px;margin-top: 0;">{{ $el->price }} грн</p>
                        <div class="btn">В КОРОБКУ</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="salad">
            <h3>Салати</h3>
            <div class="main-content">
                @foreach($data->where('type','salad') as $el)
                    <div class="item" id="{{ $el->id }}" onclick="goto('{{$el->type}}', {{$el->id - 43}})">
                        <div class="t" style="background: url('{{asset('img/'.$el->src.'.png')}}');">
                            <div class="desc"><p class="text">{{ $el->desc }}</p></div>
                        </div>
                        <p>{{ $el->name }}</p>
                        <p style="font-weight:bolder;font-size: 20px;margin-top: 0;">{{ $el->price }} грн</p>
                        <div class="btn">В КОРОБКУ</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="main">
            <h3>Основні</h3>
            <div class="main-content">
                @foreach($data->where('type','main') as $el)
                    <div class="item" id="{{ $el->id }}" onclick="goto('{{$el->type}}', {{$el->id - 52}})">
                        <div class="t" style="background: url('{{asset('img/'.$el->src.'.png')}}');">
                            <div class="desc"><p class="text">{{ $el->desc }}</p></div>
                        </div>
                        <p>{{ $el->name }}</p>
                        <p style="font-weight:bolder;font-size: 20px;margin-top: 0;">{{ $el->price }} грн</p>
                        <div class="btn">В КОРОБКУ</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="dessert">
            <h3>Десерти</h3>
            <div class="main-content">
                @foreach($data->where('type','dessert') as $el)
                    <div class="item" id="{{ $el->id }}" onclick="goto('{{$el->type}}', {{$el->id - 64}})">
                        <div class="t" style="background: url('{{asset('img/'.$el->src.'.png')}}');">
                            <div class="desc"><p class="text">{{ $el->desc }}</p></div>
                        </div>
                        <p>{{ $el->name }}</p>
                        <p style="font-weight:bolder;font-size: 20px;margin-top: 0;">{{ $el->price }} грн</p>
                        <div class="btn">В КОРОБКУ</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="drink">
            <h3>Напої</h3>
            <div class="main-content">
                @foreach($data->where('type','drink') as $el)
                    <div class="item" id="{{ $el->id }}" onclick="goto('{{$el->type}}', {{$el->id - 76}})">
                        <div class="t" style="background: url('{{asset('img/'.$el->src.'.png')}}');">
                            <div class="desc"><p class="text">{{ $el->desc }}</p></div>
                        </div>
                        <p>{{ $el->name }}</p>
                        <p style="font-weight:bolder;font-size: 20px;margin-top: 0;">{{ $el->price }} грн</p>
                        <div class="btn">В КОРОБКУ</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <img src="{{asset('img/layout/upward.png')}}" alt="" class="scroll-top">
@endsection

@section('script')
    <script src="{{asset('js/delivery.js')}}"></script>

    <script>
        document.querySelector('.scroll-top').addEventListener('click', () => {
            // document.body.animate({scrollTop: 0}, 300);
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
@endsection
