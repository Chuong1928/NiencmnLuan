
<?php
$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "a1";
				$conn = mysqli_connect($servername, $username, $password,$dbname);
				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}
$id = $_POST['id'];
$da=$_POST['da'];
// echo($id);
if($id != ""){
	// sql to delete a record
	// $sql = "INSERT into CA FROM hocsinh WHERE hocsinh.mahocsinh = '{$id}'";
	$sql="UPDATE cauhoi SET DapAnChon = '{$da}' WHERE Mach = '{$id}' ";
	 // var_dump($sql);
	// echo($sql);
	// echo($da);
	// echo($id);
	if ($conn->query($sql) === TRUE) {
		echo 1;
		exit;
	} else {
		echo 0;
		exit;
	}
	$conn->close();
}
?>