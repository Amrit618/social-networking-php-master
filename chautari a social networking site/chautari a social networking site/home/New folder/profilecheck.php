<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
<body>
<link rel='stylesheet' href='../style/style.css'> 

<?php 
mysql_connect("localhost","root","");
mysql_select_db('friend_system'); 
 ?>
<?php include 'functions.php' ?>
<?php include '../header/header.php' ?>
<div class='container'>



<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if(isset($_GET['user']) && !empty($_GET['user']))
{
	$user=$_GET['user'];

}
else
{
	$user=$_SESSION['username'];
}

$my_id=$_SESSION['username'];
$username=getuser($user,'username');
?>

<?php
$checkphoto = mysql_query("SELECT id,photo FROM users WHERE username='$user'");
$row=mysql_fetch_array($checkphoto);
$id=$row['id'];
$photo =$row['photo'];


?>
<br/><img src="<?php echo $row['photo']; ?>" height='200' width='200'/>

<h3><?php echo "username : $user"; ?></h3>


<br/>

<?php
error_reporting(E_ALL ^ E_NOTICE);


$query =mysql_query("SELECT fname,lname from users where username='$user'"); 
if(!$query)
{
	
	die(mysql_error());
}


while($row=mysql_fetch_assoc($query))
{

$firstname = $row['fname'];
$lname = $row['lname'];



}

?>
<strong>
<?php
echo  $firstname; echo " ";
echo  $lname;
?>
</strong>
<?php
//echo "<h3>Education : </h3>" .$education;
//echo "<h3>About  : </h3>" .$describeyourself; 

?>



</div>

<?php

if($user !==$my_id)
{
 
 $profile_id = $_SESSION['id'];
	$check_frnd_query=mysql_query("SELECT id FROM friend_list WHERE (user_one='$id' AND user_two='$profile_id') OR (user_one='$profile_id' AND user_two='$id')");
	if(mysql_num_rows($check_frnd_query)>0)
	{

		?>
		<form method="post" >
<input type="submit" value="unfriend" name="unfriend">
</form>
		
<?php
	}
}

if(isset($_POST['unfriend']))
{
	$userone = $_SESSION['id'];
	$usertwo =$id;
$delete ="DELETE  FROM friend_list WHERE (user_one='$userone' AND user_two='$usertwo') OR (user_one='$usertwo' AND user_two='$userone') ";
	mysql_query($delete) or die(mysql_error());
}


?>




</body>
</html>