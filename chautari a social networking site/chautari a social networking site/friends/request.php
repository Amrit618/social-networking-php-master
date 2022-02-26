<html>
<head>
<title>members</title>
</head>
<body>
<link rel='stylesheet' href='../style/style.css'>
<?php 
//session_start();
include 'connect.php' ?>
<?php include '../header/header.php' ?>
 

<?php

$query="SELECT id,sender,receiver FROM friend_request";
$sql=mysql_query($query);

while($row=mysql_fetch_array($sql))
{

if($_SESSION['id']!=$row['sender']){
	$toaccept= $row['sender'];	
	$sender_id=$row['id'];
	// echo $sender_id;

	$query11=mysql_query("SELECT username FROM users WHERE id=$toaccept ");
	$sql1=mysql_fetch_array($query11);

	$name = $sql1['username'];

	?>
	<a href="../home/profilecheck.php?user=<?php echo $toaccept;  ?> " style="text-decoration:none;" > <?php echo $name; ?></a><br/>
	<?php
	//echo $sender_id;
	 //friend request sender
	?>
<br/>
	<form method="post" >
	<input type="text" name="requestid" value="<?php echo $sender_id; ?>" hidden>
	<input type="submit" name="accept" value="accept" class="btn btn-primary">
	<input type="submit" name="ignore" value="reject" class="btn btn-primary"><br/>
<?php
}

}
if(isset($_POST['accept']))
{



	$accepter = $_SESSION['id'];
	$query =("INSERT  INTO friend_list (user_one,user_two) VALUES ('$accepter','$toaccept')"); 

mysql_query($query) or die(mysql_error());
 






	$delete ="DELETE FROM friend_request WHERE id='".$_POST["requestid"]."'";
	mysql_query($delete) or die(mysql_error());

header('location:friendrequestaccepted.php');



}


 if(isset($_POST['ignore']))
{




$accepter = $_SESSION['id'];
	$delete ="DELETE FROM friend_request WHERE id='".$_POST["requestid"]."'";
	mysql_query($delete) or die(mysql_error());
	
}

?>

<?php
$id= $_SESSION['id'];

$sql= "SELECT * FROM friend_request WHERE receiver='$id' ";
if($result=mysql_query($sql))
{
	$rowcount=mysql_num_rows($result);
	  $_SESSION['friends'] = $rowcount;

	  if($rowcount=='')
	  {

	  	echo "<br/>

	  	<h3>you have currently no friend request</h3>";
	  }



}



?>






</div>













