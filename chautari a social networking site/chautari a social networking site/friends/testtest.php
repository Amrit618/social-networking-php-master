
<?php


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
<h3><?php echo "$user"; ?></h3>
<br/>
<?php
if($user !=$my_id)
{
	$check_frnd_query=mysql_query("SELECT id FROM friend_list WHERE (user_one='$my_id' AND user_two='$user') OR (user_one='$user' AND user_two='$my_id')");
	if(mysql_num_rows($check_frnd_query)==1)
	{
	
$query = mysql_query("SELECT id,username,status FROM homestatus  ");
while($row=mysql_fetch_assoc($query))
{

	$username =$row['username'];
	 $sharestatus=  $row['status'];
?>

<a href="profile.php" > <?php echo $username; ?> </a><br/>
<?php echo $sharestatus; ?>
<br/>
<a href="#">like</a> <a href="#">comment </a></br><br/> </br>
<?php
}



?>

