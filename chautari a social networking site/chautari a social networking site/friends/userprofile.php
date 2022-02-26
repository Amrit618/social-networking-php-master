<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
<body>
<link rel='stylesheet' href='../style/style.css'> 

<?php include 'connect.php' ?>
<?php include 'functions.php' ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include '../header/header.php'; ?>
<div class='container'>



<?php


if(isset($_GET['user']) && !empty($_GET['user']))
{
	$user=$_GET['user'];


}
else
{
	$user=$_SESSION['username'];
}

$my_id=$_SESSION['id'];
$username=getuser($user,'username');
?>
<h3><?php 


$query=mysql_query("SELECT username FROM users where id=$user");
$row=mysql_fetch_array($query);

$uname = $row['username'];


		echo "$uname"; 




?></h3>
<?php
$checkphoto = mysql_query("SELECT id,photo FROM users WHERE username='$user'");
$row=mysql_fetch_array($checkphoto);
$id=$row['id'];
$photo =$row['photo'];


?>
<br/><img src="<?php echo $photo; ?>" height='200' width='200'/>




<br/>


<?php
error_reporting(E_ALL ^ E_NOTICE);


$query =mysql_query("SELECT phonenumber,address,education,describeyourself from profileinfo where username='$user'"); 
if(!$query)
{
	
	die(mysql_error());
}


while($row=mysql_fetch_assoc($query))
{

$phonenumber = $row['phonenumber'];
$address = $row['address'];
$education= $row['education'];
$describeyourself=$row['describeyourself'];



}

echo "<h3>phone number : </h3>" .$phonenumber;
echo "<h3>Address : </h3>" .$address;
echo "<h3>Education : </h3>" .$education;
echo "<h3>About you : </h3>" .$describeyourself; 

?>



</div>



</body>
</html>