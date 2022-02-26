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
 <div class="profile_check_left">
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
if($user !=$my_id)
{
	$check_frnd_query=mysql_query("SELECT id FROM friend_list WHERE (user_one='$my_id' AND user_two='$user') OR (user_one='$user' AND user_two='$my_id')");
	if(mysql_num_rows($check_frnd_query)>0)
	{
		
	}
	else
	{
		?>
		<form method="post" >
<input type="submit" value="add as friend" name="addfrnd" class="btn btn-info">
</form>
<?php
	}
}

if(isset($_POST['addfrnd']))
{
    $me= $_SESSION['username'];
	$query3 = mysql_query("SELECT id FROM users WHERE username='$me' ");
	$row3=mysql_fetch_array($query3);
	$reqsender=$row3['id'];
	 $reqreceiver = $user;
	


	

	$query4="INSERT INTO  friend_request (sender,receiver)VALUES ('$reqsender','$reqreceiver')";
	if(mysql_query($query4))
	{
	//	echo " <br/>successfully inserted";
		header('location:friendrequestsent.php');
	}
	
}


?>

<?php

if($user !==$my_id)
{
$id=$user; 
 $profile_id = $_SESSION['id'];
	$check_frnd_query=mysql_query("SELECT id FROM friend_list WHERE (user_one='$id' AND user_two='$profile_id') OR (user_one='$profile_id' AND user_two='$id')");
	if(mysql_num_rows($check_frnd_query)>0)
	{

		?>
		<form method="post" >
<input type="submit" value="unfriend" name="unfriend" class="btn btn-warning">
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
</div>












<?php
$useridpro = $user;
$query =mysql_query("SELECT * from profileinfo where userid='$useridpro' "); 
if(!$query)
{
	
	die(mysql_error());
}


while($row=mysql_fetch_array($query))
{

$job = $row['job'];
$education=$row['education'];
$graduation=$row['graduation'];
$hometown=$row['hometown'];
$currentcity=$row['currentcity'];
$dateofbirth=$row['dateofbirth'];
$gender=$row['gender'];
$phonenumber=$row['phonenumber'];
$website=$row['website'];
$emailid=$row['emailid'];


}

?>
<div class="profile_check_middle" >

<button data-toggle="collapse" data-target="#demo1" class="btn btn-info">Job and education</button>

<div id="demo1" class="collapse in">
<div class="panel panel-primary" style="width:500px;" >
      <div class="panel-heading">Job and Education</div>
      <div class="panel-body"><?php echo "<h3>Job  </h3>" .$job; ?></div>
      <div class="panel-body"> <?php echo "<h3>education  </h3>" .$education; ?></div>
      <div class="panel-body"><?php echo "<h3>graduation  </h3>" .$graduation;  ?></div>
    </div>
</div><br/><br/>


<button data-toggle="collapse" data-target="#demo2" class="btn btn-info">Address</button>

<div id="demo2" class="collapse in">

<div class="panel panel-primary" style="width:500px;">
      <div class="panel-heading" >Address</div>
      <div class="panel-body"><?php echo "<h3>hometown</h3>" .$hometown; ?></div>
      <div class="panel-body"> <?php echo "<h3>currentcity</h3>" .$currentcity; ?></div>
      
    </div>
</div><br/><br/>

</div>

<div class="profile_check_right">
<button data-toggle="collapse" data-target="#demo3" class="btn btn-info">Contacts</button>

<div id="demo3" class="collapse in">

<div class="panel panel-primary" style="width:500px;">
      <div class="panel-heading">Contact</div>
      <div class="panel-body"><?php echo "<h3>phonenumber</h3>" .$phonenumber; ?></div>
      <div class="panel-body"> <?php echo "<h3>website</h3>" .$website;  ?></div>
      <div class="panel-body"> <?php echo "<h3>emailid</h3>" .$emailid;  ?></div>
      
    </div>
</div><br/><br/>


<button data-toggle="collapse" data-target="#demo4" class="btn btn-info">Basic Info</button>

<div id="demo4" class="collapse in">
<div class="panel panel-primary" style="width:500px;">
      <div class="panel-heading">Basic info</div>
      <div class="panel-body"><?php echo "<h3>date of birth </h3>" .$dateofbirth; ?></div>
      <div class="panel-body"> <?php echo "<h3>gender</h3>" .$gender; ?></div>
      
    </div>
</div><br/><br/>







<style>
.profile_check_left{
	width:20%;
height:100%;
float:left;
}
.profile_check_middle{
	width:40%;
height:100%;
float:left;
}
.profile_check_right{
	width:40%;
height:100%;
float:left;
}

</style>


</body>
</html>