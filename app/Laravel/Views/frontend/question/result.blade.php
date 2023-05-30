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
            position: relative;
            top: 5px;
        }

        .bg__avatar {
            height: 80px;
            width: 80px;
            border-radius: 50%;
          

        }

       
        .first__container {
            position: relative;
        }

        .text__containerText {
            position: absolute;
            bottom: 0px
        }

        .first__container .bg__ {
            position: absolute;
            top: 88px;
            left: 47%;
        }
        .second__container .bg__ {
            position: absolute;
            top: 245px;
            left: 40%;
        }
        .third__container .bg__ {
            position: absolute;
            top: 275px;
            left: 55.5%;
        }

        .text__containerText {
            position: absolute;
            bottom: -23px;
            white-space: nowrap;
        }


        
    </style>


@stop
@section('content')

    <div class="container">
        <div class="wrapper">
            <div class="first__container">
                <div class="bg__">
                    <img src="{{ asset('uploads/images/' . $first->file_name) }}" class="bg__avatar">
                    <p class="text__containerText">{{ $first->name}}</p>
                </div>
            </div>
            <div class="second__container">
                <div class="bg__">
                    <img src="{{ asset('uploads/images/' . $second->file_name) }}" class="bg__avatar">
                    <p class="text__containerText">{{ $second->name}}</p>
                </div>
            </div>
            <div class="third__container">
                <div class="bg__">
                    <img src="{{ asset('uploads/images/' . $third->file_name) }}" class="bg__avatar">
                    <p class="text__containerText">{{ $third->name}}</p>
                </div>
            </div>
            <img src="{{ asset('frontend/img/winner.png') }}" class="bg__homepage">

        </div>
        <a href="{{ route('frontend.main') }}" class="btn__start txt__oswald400">END GAME</a>
    </div>



@stop
