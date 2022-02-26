<link rel='stylesheet' href='../style/style.css'>

<?php
//session_start();
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost","root","");
mysql_select_db("friend_system");
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);

?>

<?php include'../header/header.php' ; ?>

<div class="profile_left"> 
<?php echo "<h3> ".$_SESSION['username']." <h3>"; ?>



<img src="<?php echo $_SESSION['profilephoto']; ?>" class="img-circle" height='200px' width='200px'/><br/><br/>
<br/>
<a href="profileview.php" style="text-decoration:none;"> Edit profile </a><br/>
</div>


</div>


<?php
$useridpro = $_SESSION['id'];
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
<div class="profile_middle" >

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

<div class="profile_right">
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




<?php
$myid= $_SESSION['id'];
$query=mysql_query("SELECT * FROM homestatus WHERE user_id='$myid'");
while($row=mysql_fetch_array($query))
{
	
	$mystatus=$row['status'];
	//echo "$mystatus";
}

?>




</div>

<style>

.profile_left{
  width:20%;
height:100%;
float:left;
}
.profile_middle{
width:40%;
height:100%;
float:left;
}
.profile_right{
width:35%;
height:100%;
float:left;
}

</style>


