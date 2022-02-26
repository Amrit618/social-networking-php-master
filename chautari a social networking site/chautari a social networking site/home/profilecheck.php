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
error_reporting(E_ALL ^ E_DEPRECATED);
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
$checkphoto = mysql_query("SELECT photo FROM users WHERE id=$user");
$row=mysql_fetch_array($checkphoto);
$photo =$row['photo'];
?>
<br/><img src="<?php echo $row['photo']; ?>" height='200' width='200' style="border-radius:20px 20px 20px 20px;"/>
<br/><br/>






<?php
$reqsender=$_SESSION['id'];
$query=mysql_query("SELECT sender,receiver  FROM  friend_request WHERE (sender='$reqsender' AND receiver='$user') OR (sender='$user' AND receiver='$reqsender')");
if(mysql_num_rows($query)>0)
{
	echo "friend request already sent";
}

else{

include 'profilecheckfrndcheck.php';



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