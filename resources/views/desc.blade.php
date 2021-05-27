@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/det.css') }}">
@endsection

@section('main')
    <div class="content">
        <div class="head">
            @if($prev != null)
                <div class="prev" onclick="goto('{{$el->type}}',
                @if($el->type === 'pizza')
                {{($el->id - 1).')'}}
                @else{{($el->id - 1 - $count[$el->type]).')'}}
                @endif"
                     style="cursor: pointer;">
                    <img src="{{ asset('img/layout/prev.png') }}" alt="">
                    <p>{{ $prev->name }}</p>
                </div>
            @else
                <div class="prev"></div>
            @endif

            <h1>{{$el->name}}</h1>

            @if($next != null)
                <div class="next" onclick="goto('{{$el->type}}', @if($el->type === 'pizza')
                {{($el->id + 1).')'}}
                @else{{($el->id + 1 - $count[$el->type]).')'}}
                @endif"
                     style="cursor: pointer;">
                    <p>{{ $next->name }}</p>
                    <img src="{{ asset('img/layout/next.png') }}" alt="">
                </div>
            @else
                <div class="next"></div>
            @endif
        </div>

        <div class="tov">
            <img src="{{ asset('img/'.$el->src.'.png') }}" alt="">
            <div class="desc">
                <p class="t1" style="font-size: 34px;">{{$el->price}} грн</p>
                <div class="btn1">В коробку</div>
                <p class="t2">{{$el->desc}}</p>
                <p class="t3">Загальна вага - {{$el->weight}} @if($el->type != 'drink')г@elseл@endif</p>
                @if($el->type == 'pizza')
                    <div class="btn2">Інгредієнти</div>
                @endif
            </div>
        </div>

        @if($el->type == 'pizza')
            <div class="ing">
                <h3>Додаткові інгредієнти</h3>
                <div class="ing-content">
                    @foreach($ing as $et)
                        <div class="item {{$et->weight.'-'.$et->price}}">
                            <img src="{{ asset('img/'.$et->src.'.png') }}" alt="">
                            <div class="tttt">
                                <p>{{$et->name}}</p>
                                <p class="price-weight">{{$et->price.' грн / '.$et->weight.' г'}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="slider">
            <div class="title">
                <p>З цим замовляють</p>
                <div class="slider-nav">
                    <img src="{{asset('img/layout/prev.png')}}" alt="" class="slide-prev">
                    <img src="{{asset('img/layout/next.png')}}" alt="" class="slide-next">
                </div>
            </div>

            <div class="wrapper">
                <div class="wrap">
                    @foreach($slides as $s)
                        @if($s->id != $el->id)
                            @if($s->type === 'pizza')
                                <div class="slide" onclick="goto('{{$s->type}}', {{$s->id}})">
                                    @else
                                        <div class="slide"
                                             onclick="goto('{{$s->type}}', {{ $s->id - $count[$s->type]}})">
                                            @endif
                                            <img src="{{ asset('img/'.$s->src.'.png') }}" alt="">
                                            <p>{{ $s->name }}</p>
                                            <p>{{ $s->price.' грн' }}</p>
                                            <div class="btn3">В коробку</div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                </div>
            </div>
        </div>
        @endsection

        @section('script')
            <script src="{{asset('js/det.js')}}"></script>
            <script>
                setId({{$el->id}});
            </script>
@endsection
