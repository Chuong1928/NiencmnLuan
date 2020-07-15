     
            <div class="ques_num">
                
                <?php 
                  $num=$_GET['index'];
                  echo '<h1 class="ques">Câu Hỏi : '.$num.'</h1>';
                 ?>
            </div> 
             
             <div class="ques_conntent">
           <!--    <h3 id="question">Khái niệm “Làn đường” được hiểu như thế nào là đúng?
              Khái niệm “Làn đường” được hiểu như thế nào là đúng?
            Khái niệm “Làn đường” được hiểu như thế nào là đúng?</h3> -->
            <?php 
                 require_once('include/function.php');
               include_once('./Connect/config.php');
               $mach=$_GET['index'];
               $sql="SELECT * from cauhoi where MaCh=$mach";
               $result=$conn->query($sql);
              $row = mysqli_fetch_assoc($result);
              $dapanchon=$row['DapAnChon'];
              echo '<h3 id="question"> '.$row['NoiDung'].' </h3>';
               ?>
             
            </div>
            <?php 
                if($_SERVER['REQUEST_METHOD']=="POST"){
                     if(isset($_POST['dapan'])){
                       $dapan=$_POST['dapan'];
                     }
                     else{
                        $dapan=false;
                     }
                    // $dapan=$_POST['dapan'];
                   if(empty($dapan)){
                      $error ="CHỌN ĐÁP ÁN ĐI BẠN ƠI";
                   }
                   else{
                     echo $dapan;
                   }
                }

                  

             ?>
            <div class="anwser">
               <?php 
            
               $mach=$_GET['index'];
               $sql="SELECT * from dapan  where MaCh=$mach";
               $result=$conn->query($sql);
                while( $row = mysqli_fetch_assoc($result)){
               
                  ?>
            
                      <input id="ckbox" TYPE="RADIO"  VALUE="A" NAME="dapan"  >
                      A. <?php  echo $row['A']; ?><BR>

                      <input id="ckbox" TYPE="RADIO" VALUE="B" NAME="dapan" >
                      B. <?php  echo $row['B']; ?><BR>

                      <input id="ckbox" TYPE="RADIO"  VALUE="C" NAME="dapan" >
                      C. <?php  echo $row['C']; ?><BR>
                      <input id="ckbox" TYPE="RADIO" VALUE="D" NAME="dapan" >
                      D. <?php  echo $row['D']; ?><BR>
                      <p style="color: red"> <?php if(!empty($error)) echo $error; ?></p>
                  
                      <?php
                }

                ?>
         <?php 
          $num=$_GET['index'];
         if ($num==1) {
           echo '<input class="btn btn-primary list-q" type="button" index=" '.$num.' " value="Câu Trước">';
         } else {
          $id=(int)$_GET['index']-1;
            echo '<input class="btn btn-primary list-q" type="button" index=" '.$id.' " value="Câu Trước ">';
         }
         
          ?>
         <?php 
          $id=(int)$_GET['index']+1;
          echo '<input class="btn btn-primary list-q" type="button" index=" '.$id.' " value="Câu Sau">';
          ?>
          <script type="text/javascript">
  jQuery(document).ready(function() {
    $('.list-q').click(function() {
  /* Act on the event */
  var index = $(this).attr("index");
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
        $(document).ready(function(){
          // alert("helloworld");
          $("input[name='chuyen_radio_tab_or_button']:eq(0) ").attr("checked","checked");
        });
      </script>
            </div>