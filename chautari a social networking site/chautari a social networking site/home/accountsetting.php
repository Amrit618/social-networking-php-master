<?php 
	mysql_connect('localhost','root','');
mysql_select_db('friend_system');
	error_reporting(E_ALL ^ E_NOTICE);
?>
<?php include'../header/header.php' ; ?>
<link rel='stylesheet' href='../style/style.css'>

<hr/>
<h3>Change password </h3>

<?php
//session_start();
//change password
if(isset($_POST['submit']))
{
   $username=$_SESSION['username'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
if($password1=='' || $password2=='')
{
	echo "passwords cannot be empty";
	exit();
}

	if($password1==$password2)
	{
	mysql_query("UPDATE users SET password='$password1' WHERE username='$username'") or die('error');
	{
		echo"success";
	}
}
else{
	echo"password do not match";
}
}


?>

<form method='POST' > 

<div class="panel panel-primary" style="width:500px;" >
      <div class="panel-heading">Change Password</div>
      <div class="panel-body">new password <input type="password" name="password1" class="form-control" style="width:400px;"></br></div>
      <div class="panel-body">confirm password<input type="password" name="password2" class="form-control" style="width:400px;" ></br> </div>
      <div class="panel-body"><input type="submit" name="submit" value="change password" class="btn btn-danger" ></div>
    </div>
</form>