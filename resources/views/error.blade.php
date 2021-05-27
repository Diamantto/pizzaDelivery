@extends('layout')

@section('style')
    <style>
        ::-webkit-scrollbar{
            width: 0;
            height: 0;
        }

        .postheader{
            display: none;
        }

        h1{
            margin-top: 50px;
            width: 100%;
            font-weight: bold;
            font-size: 30px;
            text-align: center;
        }

        .error{
            display: block;
            margin: 0 auto;
            width: 400px;
            height: auto;
        }

        footer{
            position: fixed;
            bottom: 0;
        }
    </style>
@endsection

@section('main')
    <h1>Сайт у розробці</h1>
    <img src="{{asset('img/error.png')}}" alt="" class="error">
@endsection
