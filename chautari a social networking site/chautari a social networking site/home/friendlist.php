<?php
//session_start();
include 'connect.php';
 include '../header/header.php' 
//echo "hello";
?>
<link rel='stylesheet' href='../style/style.css'>


<?php

$me = $_SESSION['id'];
echo $_SESSION['username'] ." friends"; 
echo "<hr/>";
$query = mysql_query("SELECT * FROM friend_list WHERE (user_one='$me' OR user_two='$me')");
while($row=mysql_fetch_assoc($query))
{
	if($me=$row['user_one'])
	{
		$friends1= $row['user_two'];

      $query1=mysql_query("SELECT username from users where id=$friends1 ");
      $row1=mysql_fetch_array($query1);

      $friends11=$row1['username'];
      //echo $friends11;
      echo "<a href='userprofile.php?user=$friends11'>$friends11</a>";
      echo "<hr/>";
	}
	elseif($me=$row['user_two'])
	{
		$friends2= $row['user_one'];
	}
}




?>