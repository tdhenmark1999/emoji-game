@extends('frontend._layouts.main')
@section('page-styles')

    <style>
        body {
            background: white
        }

        .bg__homepage {
            height: 90vh;
        }


        .container,
        .wrapper {
            text-align: center
        }

        .btn__start {
            background: #fcaf01;
            padding: 10px 30px;
            border-radius: 40px;
            color: white;
            font-weight: 400;
            text-align: center;
            font-size: 25px;
            letter-spacing: 2px;
        }
    </style>


@stop
@section('content')

    <div class="container">
        <div class="wrapper">

            <img src="{{ asset('frontend/img/landing.png') }}" class="bg__homepage">

        </div>
        <a href="{{ route('frontend.question', 1) }}" class="btn__start txt__oswald400">START THE GAME</a>
    </div>



@stop
