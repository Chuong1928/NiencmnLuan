
<?php 
require_once('include/function.php');
if(!isset($_COOKIE['CHUONGDZ'])){
    		unset($_SESSION['username']);
    		echo "dang nhap lai";
    		header('location:index.php');
    	} ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>

			 <tr>

                        <form method="post" action="login.php">
                        	 <td colspan="2">

                             <input type="submit" class="form-control btn-info submit_login" value="Logout" name="submit">

                         </td>
                        </form>

                     </tr>
                     <?php
                      if(isset($_POST['submit'])){
				   			require_once('include/function.php');
							if (isset($_SESSION['username'])) {
								unset($_SESSION['username']);
								setcookie ("CHUONGDZ", 'usr='.$f_user.'&hash='.$f_pass, time() - 400);
							}
							echo "Dang nhap de tiep tuc";
							header('Location: index.php');
				    }
						?>
    </body>
</html>