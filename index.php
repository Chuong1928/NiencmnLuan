<?php

    session_start();

    include_once('./Connect/config.php');

    //kiem tra cookie xem da tôn tai chua

    //neu chua thi minh ha dang nhap;

    if(empty($_SESSION['username'])){
    	 		echo "test";
    	 		echo "<hr>";
		        if(isset($cookie_name)){

		            if(isset($_COOKIE[$cookie_name])){

		                parse_str($_COOKIE[$cookie_name]);

		                $sql2="select * from user where username='$usr' and password='$hash'";

		                $result2=mysql_query($sql2,$dbconect);

		                if($result2){
		                	echo "chua dung";
		                    header('location:index.php');
		                    exit;
		                   

		                }

		            }

		        }

    }

    else{

     	//cookie het time (ko ton tais)
    	if(!isset($_COOKIE['CHUONGDZ'])){
    		unset($_SESSION['username']);
    		echo "dang nhap lai";
    		header('location:index.php');
    	}
    	else
        	//dang nhap thanh cong
        	header('location:login.php');

    }    


    if(isset($_POST['submit'])){

        

        $username=$_POST['username'];

        $password=($_POST['password']);

        if($username=="" || $password==""){

            echo "vui long dien day du thong tin";
            header('location:index.php');
            exit;

        }

        else{

            $sql="select * from user where username='$username' and password='$password'";

            echo $sql;

            $result=$conn->query($sql);

            if(!$result){

                echo "loi cau truy van".mysql_error();

                exit;

            }


        $row = mysqli_fetch_assoc($result);
            $f_user=$row['username'];

            $f_pass=$row['password'];

            if($f_user==$username && $f_pass==$password){

                $_SESSION['username']=$f_user;

                $_SESSION['password']=$f_pass;
                    setcookie ("CHUONGDZ", 'usr='.$f_user.'&hash='.$f_pass, time() + 400);
                    echo $_COOKIE['CHUONGDZ'];

                // header('location:login.php');//chuyền qua trang đăng nhập thành công
              		  echo "Đăng nhập oke";
                exit;


            }

        }

    }
?>

<!DOCTYPE html>

<html>

<head>

    <title>Login Remember</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>

<div class="container">

    <div class="form">

        <form action="index.php" method="post">

                 <h3 class="btn btn-primary form-control">Login Infomation</h3>

                 <table class="table">

                     <tr>

                         <td><label class="label label-danger">Username</label></td>

                         <td><input type="text"  class="form-control" name="username" value=""></td>

                     </tr>

                     <tr>

                         <td><label class="label label-danger">Password</label></td>

                         <td><input type="password" class="form-control" name="password" value=""></td>

                     </tr>

                   

                     <tr>

                         <td colspan="2">

                             <input type="submit" class="form-control btn-info submit_login" value="Login" name="submit">

                         </td>

                     </tr>
					
                 </table>

            

        </form>

    </div>


</div>

<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</body>

</html>