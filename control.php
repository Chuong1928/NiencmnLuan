     
            <div class="ques_num">
                
                <?php 
                  $num=$_GET['index'];
                  echo '<h1 class="ques">Câu Hỏi : '.$num.'</h1>';
                 ?>
            </div> 
             
             <div class="ques_conntent">
            <?php 
                 require_once('include/function.php');
               include_once('./Connect/config.php');
               $mach=$_GET['index'];
               $sql="SELECT * from cauhoi where MaCh=$mach";
               $result=$conn->query($sql);
              $row = mysqli_fetch_assoc($result);
              $dapanchon=$row['Trangthai'];
              echo '<h3 id="question"> '.$row['NoiDung'].' </h3>';
               ?>
             
            </div>
      <!--       <?php 
                if($_SERVER['REQUEST_METHOD']=="POST"){
                     if(isset($_POST['dapan'])){
                       $dapan=$_POST['dapan'];
                     }
                     else{
                        $dapan=false;
                     }
                    
                   if(empty($dapan)){
                      $error ="CHỌN ĐÁP ÁN ĐI BẠN ƠI";
                   }
                   else{
                     echo $dapan;
                   }
                }


             ?> -->
            <div class="anwser">
               <?php 
               $mach=$_GET['index'];
               $sql="SELECT * from dapan  where MaCh=$mach";
               $result=$conn->query($sql);
                while( $row = mysqli_fetch_assoc($result)){
               
                  ?>
            
                      <input id="ck0" TYPE="RADIO"  VALUE="0" NAME="dapan" <?php if(isset($dapanchon) && $dapanchon=='0')  echo "checked='checked' " ?> >
                      A. <?php  echo $row['A']; ?><BR>

                      <input id="ck1" TYPE="RADIO" VALUE="1" NAME="dapan" <?php if(isset($dapanchon) && $dapanchon=='1')  echo "checked='checked' " ?>>
                      B. <?php  echo $row['B']; ?><BR>

                      <input id="ck2" TYPE="RADIO"  VALUE="2" NAME="dapan" <?php if(isset($dapanchon) && $dapanchon=='2')  echo "checked='checked' " ?> >
                      C. <?php  echo $row['C']; ?><BR>
                      <input id="ck3" TYPE="RADIO" VALUE="3" NAME="dapan" <?php if(isset($dapanchon) && $dapanchon=='3')  echo "checked='checked' " ?> >
                      D. <?php  echo $row['D']; ?><BR>
                      <p style="color: red"> <?php if(!empty($error)) echo $error; ?></p>
                  
                      <?php
                }

                ?>
         <?php 
          $num=$_GET['index'];
         if ($num==1) {
           echo '<input class="btn btn-primary list-q" type="button"  truongdz=" '.$num.' " value="Câu Trước">';
         } else {
          $id=(int)$_GET['index']-1;
            echo '<input class="btn btn-primary list-q back insert_b"  type="button"  truongdz=" '.$id.' " value="Câu Trước ">';
         }
  
          ?>
         <?php 
          $id=(int)$_GET['index']+1;
          echo '<input id="btnsubmit" class="btn btn-primary list-q insert next"   type="button" truongdz=" '.$id.' " value="Câu Sau">';
          ?>
  <script type="text/javascript">
  $(document).ready(function(){
 $('.insert').click(function(){
   // var el = this;
   // var id = this.id;
   // var splitid = id.split("_");
   // // Delete id
   // //dapancon
   var index = $(this).attr("truongdz")-1;
    var vall=$('input[type="RADIO"]:checked');
    // alert(index);
    
    // alert(vall.val());
   // AJAX Request
   $.ajax({
     url: 'insert.php',
     type: 'POST',
     data: { id:index,da:vall.val() },
     success:function(response){
      if(response ==1){

      }else{

    alert('Lỗi');
    alert(response);
    //alert(id);
      }

    }
   });

 });

});

</script>
  <script type="text/javascript">
  $(document).ready(function(){
 $('.insert_b').click(function(){
   // var el = this;
   // var id = this.id;
   // var splitid = id.split("_");
   // // Delete id
   // //dapancon
   var index = $(this).attr("truongdz")-(-1);
    var vall=$('input[type="RADIO"]:checked');
    // alert(index);
    
    // alert(vall.val());
   // AJAX Request
   $.ajax({
     url: 'insert.php',
     type: 'POST',
     data: { id:index,da:vall.val()},
     success:function(response){
      if(response ==1){

      }else{

    alert('Lỗi');
    alert(response);
    //alert(id);
      }

    }
   });

 });

});

</script>
 <script type="text/javascript">
  jQuery(document).ready(function() {
    $('.next').click(function() {
  /* Act on the event */
  var index = $(this).attr("truongdz");
  $.ajax({
    url: 'control.php',
    type: 'GET',
    data: {index: index},
    success:function(data){
      //alert("oke");
      $('.question').html(data);
    }
   });

});
  });

</script>
 <script type="text/javascript">
  jQuery(document).ready(function() {
    $('.back').click(function() {
  /* Act on the event */
  var index = $(this).attr("truongdz");
  $.ajax({
    url: 'control.php',
    type: 'GET',
    data: {index: index},
    success:function(data){
      //alert("oke");
      $('.question').html(data);
    }
   });

});
  });

</script>
<div id="test"></div>
 <script>
        $(document).ready(function(){
        var vall=$('input[type="RADIO"]:checked');
          if(vall==null){
            alert("bạn chưa chọn");
          }
        // alert("helloworld");
       //   $("input[name='dapan']:eq(0) ").attr("checked","checked");
        });
      </script>
            </div>
