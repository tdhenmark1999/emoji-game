@extends('frontend._layouts.main')
@section('content')

    <div class="clearfix"></div>
    <div class="wrapper">
        <div class="steps-area steps-area-fixed">
            <div class="image-holder">
                <img src="{{asset('frontend/img/side-img3.png')}}" alt="">
            </div>
            <div class="player__containerSide">
                <h3 class="txt__oswald600 player__containerTitle">PLAYER SCOREBOARD</h3>
                
                @foreach ($users as $user)
                <div class="d-flex justify-content-between">
                    <div class="container__avatarScoreboard">
                    <img src="{{ asset('uploads/images/' . $user->file_name) }}" class="bg__avatarScoreboard">
                    <p class="player__containerList txt__poppins400">{{ trim($user->name) }} 
                        <img class="scoreboard__size {{ $first->name == $user->name && $first->result != 0 ? 'visible' : 'd-none' }}" src="{{asset('frontend/img/first.png')}}">
                        <img class="scoreboard__size {{ $second->name == $user->name && $second->result != 0 ? 'visible' : 'd-none' }}" src="{{asset('frontend/img/second.png')}}">
                        <img class="scoreboard__size {{ $third->name == $user->name && $third->result != 0 ? 'visible' : 'd-none' }}" src="{{asset('frontend/img/third.png')}}">
                        
                    </p>
                </div>
                    <p class="player__containerList txt__poppins400">{{ $user->result }}</p>
                </div>
                @endforeach
            </div>
        </div>
        <form class="multisteps-form__form" id="wizard" method="POST">
            <div class="timer__wrapper">
                <div class="timer__container">
                    <div id="countdown" class="timer__content">20</div>
                </div>
            </div>
           
            {!! csrf_field() !!}
            <div class="form-area position-relative">
                <!-- div 1 -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner clearfix">
                            <div class="form-content pera-content" style="width: 100%">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Question {{ $question->id }}</span>

                                    <h2 style="padding-top: 30px;color:#fcaf01">GUESS THE MOVIE </h2>

                                    <img id="blah_primary_back" class="img__emoji" src="{{ asset('uploads/images/' . $question->file_name) }}"alt="" />
                                    <div class="services-select-option">
                                        <ul class="choices__wrapper">
                                            @foreach (explode(',', $question->description) as $info)
                                                <li
                                                    class="pointer__eventNone bg-white choices__content {{ trim($info) == trim($question->name) ? 'active-data' : '' }}">
                                                    <label>{{ $info }} <input class="choices__data" disabled type="radio" name="web_service" value={{ $info }}></label>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                    <div class="language-select">
                                        <p class="language-select__content mb-0">
                                            List of Players</p>
                                        <select name="result">
                                            <option selected value="">-- Select Winner --</option>
                                            @foreach ($player_list as $user)
                                                <option value={{ $user->id }}>{{ $user->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->first('result'))
                                        <span class="help-block">{{ $errors->first('result') }}</span>
                                    @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <ul>
                                <li><a onclick="changeClass()"><span class="js-btn-prev txt__oswald600" title="BACK">SHOW </span></a>
                                </li>
                                @if ($question->id === $question->count())
                                    <li><button style="background-color: #fcaf01" type="submit"><span style="background-color: #fcaf01" class="js-btn-next txt__oswald600" title="FINISH">FINISH <i
                                                    class="fa fa-arrow-right"></i></span></button>
                                    </li>
                                @else
                                    <li><button style="background-color: #fcaf01" type="submit" id="next__btn"><span style="background-color: #fcaf01" class="js-btn-next txt__oswald600" title="NEXT">NEXT
                                                <i class="fa fa-arrow-right"></i></span></button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
