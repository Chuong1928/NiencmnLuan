<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <script>
		var seconds = 10;
		function timer() {
			var days        = Math.floor(seconds/24/60/60);
			var hoursLeft   = Math.floor((seconds) - (days*86400));
			var hours       = Math.floor(hoursLeft/3600);
			var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
			var minutes     = Math.floor(minutesLeft/60);
			var remainingSeconds = seconds % 60;
			if (remainingSeconds < 10) {
				remainingSeconds = "0" + remainingSeconds; 
			}
			document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
			if (seconds == -1) {
				clearInterval(countdownTimer);
				confirm("Hết thời gian");
				$('#form2').submit();
				document.getElementById('countdown').innerHTML = "Finish!";
			} else {
				seconds--;
			}
		}
		var countdownTimer = setInterval('timer()', 1000);//chỗ này là số 1000 là đúng.
      </script>
      <div id="countdown"></div>
</body>
</html>