@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/box.css')}}">
@endsection

@section('main')
    <div class="content">

        <h2>КОРЗИНА</h2>

        <div class="elem">

        </div>

        <p class="result-price"></p>

        <button class="addOrder">Замовити</button>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/box.js')}}"></script>
@endsection
