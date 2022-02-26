
<?php
    session_start();

    error_reporting(E_ALL ^ E_DEPRECATED);
   mysql_connect("localhost","root","");
   mysql_select_db('friend_system');
   error_reporting(E_ALL ^ E_DEPRECATED);
   
	error_reporting(E_ALL ^ E_NOTICE);
?>

<?php include'../header/header.php' ; ?>
<a href="profile.php" > view profile </a> 
<link rel='stylesheet' href='../style/style.css'>
 

<div class="homeleft">


</div>

 <div class="profile_mid">
<h3> change profile picture </h3>

<?php
$fetchid=mysql_query("SELECT id FROM users where username='".$_SESSION['username']."' ");
$row=mysql_fetch_array($fetchid);
$id=$row['id'];
if(isset($_POST['upload_pic']))
{
   
	$file_name=$_FILES['profilepic']['name'];
	$file_type=$_FILES['profilepic']['type'];
	$file_size=$_FILES['profilepic']['size'];
	$file_tmp_name=$_FILES['profilepic']['tmp_name'];
	$destination = "photo/".$file_name;
	if($file_name)
	{
	
		move_uploaded_file($file_tmp_name, $destination);
		$sql=("UPDATE users SET photo='$destination' WHERE id=$id") ;
		
		if(mysql_query($sql) or die(mysql_error())){
			
		}
		
	}
}
$sql     = "SELECT photo FROM users WHERE id = $id";
$res     = mysql_query($sql);
$records = mysql_fetch_array($res);

?>
<form method='POST' action="" enctype="multipart/form-data">

<label class="btn btn-default btn-file" >
    Upload photo <input type="file"  name="profilepic" style="display: none;">
</label>
<input type="submit" name="upload_pic" class=" btn btn-success" value="change profile pic " />
</form>

<?php

if($records['photo']=='')
{
?>
<img src="./photo/default.jpg" height='200' width='200'>
<?php
}
else
{
 $profilepic =$records['photo'];

      $_SESSION['profilephoto']=$profilepic; 
      
      ?>

		<img src=<?php echo $records['photo'] ?> height='200' width='200'/>     
	<?php
		}

      ?>




<?php

$usersessionid= $_SESSION['id'];
?>
     
   









<form method="post">
<h2>Work and education </h2>
Job<input type="text" class="form-control" name="job" placeholder="your workplace">
<input type="submit" class="btn btn-info" name="job_post" value="save" ></br>
<?php
if(isset($_POST['job_post']))
{
	$job1=$_POST['job'];
	$query1=mysql_query("UPDATE  profileinfo SET job='$job1' WHERE userid= $usersessionid ");
}

?>

Education<input type="text" class="form-control" name="education" placeholder="your college">

<input type="submit" class="btn btn-info" name="education_post" value="save" ></br>
<?php
if(isset($_POST['education_post']))
{
	$education=$_POST['education'];
	$query2=mysql_query("UPDATE profileinfo SET education='$education' WHERE userid= $usersessionid  ");
}

?>

Graduation<input type="text" class="form-control" name="graduation" placeholder="your graduation faculty">
<input type="submit" class="btn btn-info" name="graduation_post" value="save" ></br>
<?php
if(isset($_POST['graduation_post']))
{
	$Graduation=$_POST['graduation'];
	$query3=mysql_query("UPDATE   profileinfo SET graduation='$Graduation' WHERE userid= $usersessionid");
}

?>
</form>










<form method="post">
<h2>Living</h2>
hometown<input type="text" class="form-control" name="hometown" >
<input type="submit" class="btn btn-info" name="hometown_post" value="save"><br/>
<?php
if(isset($_POST['hometown_post']))
{
	$hometown=$_POST['hometown'];
	$query4=mysql_query("UPDATE profileinfo SET hometown='$hometown' WHERE userid= $usersessionid");
}



?>


current city<input type="Text" class="form-control" name="current_city">
<input type="submit"  class="btn btn-info" name="current_city_post" value="save"><br/>
<?php
if(isset($_POST['current_city_post']))
{
	$currentcity=$_POST['current_city'];
	$query5=mysql_query("UPDATE profileinfo SET currentcity='$currentcity' WHERE userid= $usersessionid");
}



?>
</form>




<form method="post" >
<h2> Basic info </h2>
Date of birth <input type="date" class="form-control" name="date_of_birth">

<input type="submit" class="btn btn-info" name="date_post" value="save"><br/>
<?php
if(isset($_POST['date_post']))
{
	$dateofbirth=$_POST['date_of_birth'];
	$query5=mysql_query("UPDATE profileinfo SET dateofbirth='$dateofbirth' WHERE userid= $usersessionid");
}



?>


Gender
<input type="text" name="Gender" class="form-control" >
	

<input type="submit" class="btn btn-info" name="Gender_post" value="save"><br/>
<?php
if(isset($_POST['gender_post']))
{
	$gender=$_POST['Gender'];

	
	$query6=mysql_query("UPDATE profileinfo SET gender='$gender' WHERE userid= $usersessionid");
}



?>


</form>





<form method="post">
<h2>Contact info</h2>
Phone number<input type="text" class="form-control" name="phone_number">
<input type="submit" class="btn btn-info" name="phone_number_post" value="save">
<?php
if(isset($_POST['phone_number_post']))
{
	$phonenumber=$_POST['phone_number'];
	$query7=mysql_query("UPDATE profileifno SET phonenumber='$phonenumber' WHERE userid= $usersessionid");
}

?>
<br/>
Website<input type="text" class="form-control" name="webaddress" >
<input type="submit" class="btn btn-info" name="webaddress_post" value="Save">
<?php
if(isset($_POST['webaddress_post']))
{
	$webaddress=$_POST['webaddress'];
	$query8=mysql_query("UPDATE  profileinfo SET website='$webaddress' WHERE userid= $usersessionid");
}

?>
<br/>
EmailID<input type="text" class="form-control" name="emailid">
<input type="submit" class="btn btn-info" name="emailid_post" value="Save"><br/>
<?php
if(isset($_POST['emailid_post']))
{
	$emailid=$_POST['emailid'];
	$query9=mysql_query("UPDATE profileinfo SET emailid='$emailid' WHERE userid= $usersessionid");
}

?>

</form>




</div>

<div class='friendlist' >
<?php
include'friendsatside.php';

?>

</div>















