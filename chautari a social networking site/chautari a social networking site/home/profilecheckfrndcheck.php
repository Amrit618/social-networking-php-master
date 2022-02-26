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
	echo "friend request sent";
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




