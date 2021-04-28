<html>
<head>
.body{
  
}

.div{
  
}
</head>
<body style="background-color:#2D3047;">
  <div style="background-color:#419D78; color:#EFD0CA; font-size:20px; text-align:center;">Time left = <span id="timer"></span></div>

</body>
<script>
	
	document.getElementById('timer').innerHTML =
  0059 + ":" + 20;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  //if(m<0){alert('timer completed')}
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  console.log(m)
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}

</script>

</html>