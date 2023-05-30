<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

<script>
    


    window.onload = function() {

        function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

        var timeleft = 20;
        var downloadTimer = setInterval(function(){
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            document.getElementById("countdown").innerHTML = "00";
            changeClass();
        } else {
            document.getElementById("countdown").innerHTML = padTo2Digits(timeleft);
        }
        timeleft -= 1;
        }, 1000);
     };

     function changeClass() {
        $(".active-data").addClass("active");
        $(".choices__content").removeClass("active-data");
     }


</script>
