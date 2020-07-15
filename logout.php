<?php
require_once('include/function.php');
if (isset($_SESSION['username'])) {
	unset($_SESSION['username']);
}
echo "Dang nhap de tiep tuc";
header('Location: index.php');
?>