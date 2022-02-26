
<html>
<head>
<title>members</title>
</head>
<body>

<?php

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost" , "root" ,"");
mysql_select_db("friend_system");
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);

?>
<link rel='stylesheet' href='../style/style.css'>
<?php //include 'connect.php' ?>
<?php include '../header/header.php' ?>
<?php include 'functions.php' ?>



</div>
</body>
</html>
