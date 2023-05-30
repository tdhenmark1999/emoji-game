<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
   href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Oswald:wght@300;400;500;600&family=Poppins:wght@200;300;400;500;600;700&display=swap"
   rel="stylesheet">
<style>
   .services-select-option li label {
      text-transform: capitalize;
   }

   .calendar__container {
      position: relative;
   }

   span.js-btn-next {
      margin: 0px;
      top: -1px;
      position: relative;
      left: -6px;
   }

   .txt__poppins200 {
      font-family: 'Poppins', sans-serif;
      font-weight: 200;
   }

   .txt__poppins300 {
      font-family: 'Poppins', sans-serif;
      font-weight: 300;
   }

   .txt__poppins400 {
      font-family: 'Poppins', sans-serif;
      font-weight: 400;
   }

   .txt__poppins500 {
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
   }

   .txt__poppins600 {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
   }

   .txt__poppins700 {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
   }


   .txt__oswald300 {
      font-family: 'Oswald', sans-serif;
      font-weight: 300;
   }

   .txt__oswald400 {
      font-family: 'Oswald', sans-serif;
      font-weight: 400;
   }


   .txt__oswald500 {
      font-family: 'Oswald', sans-serif;
      font-weight: 500;
   }


   .txt__oswald600 {
      font-family: 'Oswald', sans-serif;
      font-weight: 600;
   }

   .txt__orbitron400 {
      font-family: 'Orbitron', sans-serif;
      font-weight: 400;
   }

   .pointer__eventNone {
      pointer-events: none;
   }

   .language-select__content {
      margin: 0px;
      margin-top: 30px;
   }

   .player__containerSide {
      position: absolute;
      top: 0px;
      height: 100%;
      width: 100%;
      font-size: 20px;
      color: white;
      line-height: 35px;
      padding: 30px;
   }

   .player__containerTitle {
      margin-bottom: 10px;
   }

   .player__containerList {
      letter-spacing: 0px;
      margin-left: 10px;
      font-family: 'Orbitron', sans-serif;
      font-size: 15px;
      font-weight: 600;
   }

   .scoreboard__size {
      height: 30px;
      width: auto;
   }

   .img__emoji {
      width: 100%;
      height: 300px;
   }

   .timer__container {
      background-image: url("{{asset('frontend/img/clock.png')}}");
      background-repeat: no-repeat;
      height: 160px;
      width: 160px;
      position: absolute;
      right: 0px;
      top: 74px;
   }

   .timer__wrapper {
      position: relative;
   }

   .timer__content {
      position: absolute;
      top: 56px;
      right: 86px;
      z-index: 99;
      font-size: 25px;
      color: white;
   }

   .help-block {
      color: red;
      margin-top: 5px;
   }

   .form-content .bottom-line {
      border-bottom: 2px solid #fcaf01;
   }

   .services-select-option li.active:after,
   .services-select-option li.active {
      border: 2px solid #fcaf01;
   }

   .services-select-option li:before {
      color: #fcaf01;
   }

   .bg__avatarScoreboard {
      height: 30px;
      width: 30px;
      border-radius: 50%;
   }

   .container__avatarScoreboard {
      display: flex;
      align-items: center;
      margin: 5px 0px;
   }
</style>