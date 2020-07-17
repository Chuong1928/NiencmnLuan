
<!DOCTYPE html>
<html>
<head>
  <!-- <title></title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hệ thống thi bằng lái xe A1</title>
  <!-- Import Boostrap css, js, font awesome here -->  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Import Boostrap css, js, font awesome here -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">    
    <link href="./css/after_check.css" rel="stylesheet">
      <link href="./css/style.css" rel="stylesheet">
     <link href="./css/responsive.css" rel="stylesheet">
  <script type="text/javascript" src="./js/script.js"></script>
<!--    <script>
        $(document).ready(function(){
          
          $("input[name='daaapan']:eq(1) ").attr("checked","checked");
           // alert("1");
        });
      </script> -->
</head>
<body> 

  <!-- Header -->
<div class="container-fluid" id="main">
  
      <h1> Hệ thống thi bằng lái xe A1</h1>
  
</div>
<!-- conntent -->
<div class="container-fluid" id="mycontent">
 <div class="row">
   <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12" id="ct-left">
        <div class="info">
            <div class="information">
                <h2 class="name">Họ và Tên : Ngô Qúy Trường </h2>
                <h2 class="birth">Ngày Sinh : 17-03-1999</h2>
                <h2 class="name">Bài Thi : Sát Hạch A1 </h2>
                <h2 class="birth">Thời gian : 15 phút</h2>
            </div>
        </div>
        <div class="question">

          <button type="button" class="btn btn-primary start" data-toggle="modal" data-target="#exampleModalCenter">
Bắt Đầu Thi !
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cảnh Báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có 15 phút để hoành thành tất cả câu hỏi.Trong khi làm nếu không chắc chắn có thể chuyển sang câu hỏi khác. Và Nhớ Kiểm tra lại lần cuối trước khi nộp bài .
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary confirm " data-dismiss="modal">Đã Rõ</button>
   
      </div>
    </div>
  </div>
</div>
        </div>
   </div>
   <script type="text/javascript">
     $(document).ready(function() {
          $('.confirm').click(function(event) {
    $.ajax({
    url: 'control.php',
    type: 'GET',
    data: {index: "1",},
    success:function(data){
      
      $('.question').html(data);
      $('.time').html('<strong class="time"> Thời gian còn lại :  <span id="countdown"></span>   </strong>');
        // alert(data);
    }
   });
          });

     });
   </script>
   <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" id="ct-right">
      <div class="checkbox">
          <form action="thithua1.php?" method="POST">
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1">Xác nhận hoàn thành và Nộp Bài</label><br>
        <a class="btn btn-primary" href="result.php">Xác Nhận</a>
      </form>
      </div>
      <strong class="time"> 
                   
               </strong>
    <div class="list_ques">

     <h1 id="list_que">Danh sách câu hỏi </h1>
    <?php
        $i=1;
        for ($i=1; $i <=20 ; $i++) { 
          echo '<input class="btn btn-primary list-q" type="button" truongdz=" '.$i.' " value="Câu '.$i.' ">';
         } 
     ?>
   </div>
   </div>

 </div>
</div>
<script type="text/javascript">
  jQuery(document).ready(function() {
    $('.list-q').click(function() {
  /* Act on the event */
  var index = $(this).attr("truongdz");
  $.ajax({
    url: 'control.php',
    type: 'GET',
    data: {index: index},
    success:function(data){
      $('.question').html(data);
        // alert(data);

    }
   });

});
  });
</script>

<script>
    var seconds = 900;
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
</body>
</html>
