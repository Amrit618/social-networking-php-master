
<html>
<head>
<title>members</title>
</head>
<body>
<link rel='stylesheet' href='../style/style.css'>
<?php include 'connect.php' ?>
<?php include '../header/header.php' ?>
 
<div class='container' > 





<?php
//error_reporting(0);
mysql_connect("localhost","root","");
mysql_select_db("friend_system");

$query="SELECT id,username FROM users";
$sql =mysql_query($query);
if(!$sql)
{
	die(mysql_error());
}
while($row=mysql_fetch_array($sql))
{

	$user_id=$row['id'];
	$user=$row['username'];


	echo "<a href='../home/profilecheck.php?user=$user_id'>$row[username]</a><br/><br/>";
}

?>

</div>
</body>
</html>
