<?php //include 'functions.php' ?>

<link rel="stylesheet" href="./style/bootstrap.min.css">
<script src="./js/bootstrap.min.js"></script>

	<link rel='stylesheet' href='./style/style.css'>
<div class='container' > 
<a href="index.php" > already member? Login here </a>


<form method="post">

<div class="panel panel-primary" style="width:500px;background:transparent;" >
      <div class="panel-heading">Registration Page</div>
      <div class="panel-body" >firstname:</br>
						<input type="text" name='fname' autocomplete='off' placeholder='your firstname' class="form-control" style="background:transparent;"/></br></div>
      <div class="panel-body" >lastname:</br>
						<input type="text" name='lname' autocomplete='off' placeholder='lastname' class="form-control" style="background:transparent;"/></br> </div>


<div class="panel-body" >Email id:<br/>
					<input type ="email" name="email" autocomplete='off' placeholder='your email' class="form-control" style="background:transparent;"/></br></div>

<div class="panel-body" >username:</br>
							<input type="text" name='usernaame' autocomplete='off' placeholder='your username' class="form-control" style="background:transparent;"/>
								<br/></div>

<div class="panel-body" >Date of birth:<br/>	<input type="date" name="bday" class="form-control" style="background:transparent;"/></br></div>

<div class="panel-body" >password:<br/>
						<input type="password" name="password1" placeholder='password' class="form-control" style="background:transparent;"/></br></div>

<div class="panel-body" >
							<br/>
							prove that you are not robot:</br>

<?php



$random=rand(100,10000);
?>

<div class="captchacode" >
<style>
.captchacode{
	height:20px;
	width:50px;
	background-image:url('captchaimage.jpg');
}
</style>
<?php
echo "<strong>&#160   ".$random." </strong> ";
?>
</div>

</br>
<input type="text" name="captcha"  class="form-control" style="background:transparent;"><br/></div>


      <div class="panel-body"><input type="submit" name="submit" value="Register"  class="btn btn-primary"/></div>
    </div>
</form>

</div>






									
<?php
mysql_connect('localhost','root','');
mysql_select_db('friend_system');

if(isset($_POST['submit']))
{


	$username=$_POST['usernaame'];
	$password=$_POST['password1'];
	$firstname=$_POST['fname'];
	$lastname=$_POST['lname'];
	$emailid=$_POST['email'];
	

$querycheck=mysql_query("SELECT * FROM  users WHERE username=$username");
if(mysql_num_rows($querycheck)>=1)
{
	echo "username exists";
}

$captchaname=$_POST['captcha'];
if($captchaname!==''|| $captchaname==$random)
{

if($username==''||$password==''||$firstname==''||$lastname==''||$emailid=='')
{
	echo"please fill all the forms";
	exit();
}
else
{

   {
        
		$query="INSERT INTO users(username,password,photo,fname,lname,email)values('$username','$password','','$firstname','$lastname','$emailid')";
		$query1=mysql_query($query);
		if(!$query1)
		{
			
		}
		if($query1)
		{

$query1=mysql_query("INSERT INTO profileinfo(username,phonenumber,address,education,describeyourself) values ('$username','','','','')");
$sentid=mysql_insert_id();
$query2=mysql_query("INSERT INTO profileinfo(userid) VALUES ('$sentid')");

echo "redirecting to login page........";

header( "refresh:1;url=index.php" );
		}
	}

}
	
}


else
{
	echo "please re-enter the captcha";
	exit();
}	
}
?>
</div>




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








