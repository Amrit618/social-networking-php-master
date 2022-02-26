
<html>
<head>
<title>members</title>
</head>
<body>

<?php

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost" , "root" ,"");
mysql_select_db("friend_system");
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);

?>
<link rel='stylesheet' href='../style/style.css'>
<?php //include 'connect.php' ?>
<?php include '../header/header.php' ?>
<?php include 'functions.php' ?>
<div id="wrap">



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

{
$query=mysql_query("SELECT username FROM users where id=$user");
$row=mysql_fetch_array($query);

$uname = $row['username'];

?>

<div class="panel panel-danger" style="width:500px;  " >
      <div class="panel-heading" ><?php echo "$uname"; ?></div>
    </div>
		<?php





?>
</h3>
<form method="post" >
<input type="text" name="message" class="form-control" style="width:500px;height:80px;" autocomplete="off">
<input type="submit" name="send" class= "btn btn-info" value="send" >
</form>
<?php
}

if(isset($_POST['send']))
{
	$message=$_POST['message'];
	$my_id=$_SESSION['id'];
	$receiver_id=$user;

	$query2=mysql_query("INSERT INTO messages (message,sender,receiver) VALUES ('$message','$my_id','$receiver_id')");
	
    
}

?>

<?php


$query3=mysql_query("SELECT * FROM messages where (sender=$my_id AND receiver=$user) OR (sender=$user AND receiver=$my_id) ORDER BY id DESC LIMIT 10 ");
	while($row3=mysql_fetch_array($query3)){


	$usermessage=$row3['message'];
	$ssender=$row3['sender'];
	$query4=mysql_query("SELECT username from users where id=$ssender");
	$row4=mysql_fetch_array($query4);
    $ssendername=$row4['username'];
	$rreceiver=$row3['receiver'];
	?>
	<div class="panel panel-primary" style="width:500px;" >
      <div class="panel-heading"><?php echo $ssendername; ?></div>
      <div class="panel-body"><?php   echo "$usermessage"; ?></div>
      
    </div>



    <?php
}
	

	

?>





</div>
</div>
<style>
#wrap{
	 width: 800px;
     margin: 0 auto;
}

</style>
</body>
</body>
</html>
