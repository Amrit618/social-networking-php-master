<?php //include 'functions.php' ?>




<link rel='stylesheet' href='./style/style.css'>
<div class='container' > 

<link rel="stylesheet" href="./style/bootstrap.min.css">
<script src="./js/bootstrap.min.js"></script>

<div id="wrap">

<a href="register.php">Register here </a>

<form method="post">

<div class="panel panel-primary" style="width:500px; background:transparent;" >
      <div class="panel-heading">Login Page</div>
      <div class="panel-body" >username</br>
<input type="text" name='username' autocomplete='off' class="form-control" style="background:transparent;" />
<br/> <br/></div>
      <div class="panel-body" >password<br/>
<input type="password" name="password"  class="form-control" style="background:transparent;"/>
<br/><br/> </div>
      <div class="panel-body"><input type="submit" name="submit" value="login"  class="btn btn-primary"/></div>
    </div>
</form>

</div>
<style>
#wrap{

  width: 800px;
     margin: 0 auto;
}

</style>





<?php

session_start();
mysql_connect("localhost","root","");
mysql_select_db("friend_system");
if(isset($_POST["submit"]))

{
$username=$_POST['username'];
$password=$_POST['password'];  

if($username==''||$password=='')
{

	?>
		<div class="alert alert-success">
  <strong>please fill all the blanks</strong>
</div>
<?php
	
}
else
{
	$check_login="SELECT id FROM users WHERE username='$username' AND password='$password'";
	$run=mysql_query($check_login);
if(mysql_num_rows($run)>0)

	{
	while($row=mysql_fetch_assoc($run))
{

	$id =$row['id'];
	 
	$_SESSION['id']=$id;
}

		
		
	$_SESSION['username']=$username;

		header('location:./home/home.php');
	}
	else
	{
		?>
		<div class="alert alert-success">
  <strong>Incorrect Username Or Passwprd</strong>
</div>
		<?php
	}
}


}

?>


<style>
body{
	background-image:url("background.jpg");
	background-repeat:no-repeat;
	 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; 
}
</style>
