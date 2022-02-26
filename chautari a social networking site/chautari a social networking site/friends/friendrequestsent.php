<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
<body>
<link rel='stylesheet' href='../style/style.css'> 

<?php
//session_start();
 include 'connect.php' ?>

<?php include '../header/header.php' ?>
<div class='container'>


<?php

echo $_SESSION['username'];
echo "  : your friend request has been sent";
?>


</form>
</div>

</body>
</html>