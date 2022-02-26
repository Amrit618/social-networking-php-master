
<link rel='stylesheet' href='../style/style.css'>

<link rel="stylesheet" href="../style/bootstrap.min.css">

<?php

 include'../header/header.php' ; ?>
          
<?php

mysql_connect("localhost","root","");
mysql_select_db("friend_system");
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$uname = $_SESSION['username'];
$query=mysql_query("SELECT id FROM users WHERE username='$uname' ");
$row=mysql_fetch_array($query);
$id=$row['id'];

$_SESSION['id'] = $id;


?>


<div class="homeleft">
<script type="text/javascript">
tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
if(nyear<1000) nyear+=1900;
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
}

window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}
</script>
<div id="clockbox"></div>
<?php
$id=$_SESSION['id'];
$sql     = "SELECT photo FROM users WHERE id = $id";
$res     = mysql_query($sql);
$records = mysql_fetch_array($res);

?>

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

    <img src=<?php echo $records['photo'] ?> height='200' width='200' style="border-radius:20px 20px 20px 20px;"/>     
  <?php
    }

      ?>





<?php include'../home/searchengine.php'; ?>
</div>







<div class="home">
<?php
echo  $_SESSION['username'];
?>


<div class="form-group">


<form method='POST' action="" enctype="multipart/form-data" >  
  <input type="text" name="status" size="40%" class="form-control" style="height:90px;" autocomplete="off" >
  <input type="submit" value="share " name="share" class="btn btn-warning" ><br/>

</form>


</div>
<?php


if(isset($_POST['share']))
{

$user = $_SESSION['id'];
$status= $_POST['status'];
$query = mysql_query("INSERT INTO homestatus(user_id,status) VALUES ('$user','$status')");

}

?>

<?php

$query1 = mysql_query("SELECT * FROM homestatus ORDER BY id DESC LIMIT 15 ");
while($row1=mysql_fetch_array($query1))
{
	$userid=$row1['user_id'];
	$userstatus=$row1['status'];
  $statusid=$row1['id'];
	
	

    $query2=mysql_query("SELECT * FROM users WHERE id=$userid");
     ($row2= mysql_fetch_array($query2));
    {
    	$username =$row2['username'];
    	$photo =$row2['photo'];
      //echo $user;
    	?>
      <img src="<?php echo $photo; ?>" height="50px" width="50px" style="border-radius:30px 30px; " >
    	<a href="profilecheck.php?user=<?php echo $userid;  ?> " > <?php echo $username; ?> </a>
    	<?php
      ?>
      <div class="statuss">
      <style>
       .statuss{
        background-image:url("statusimage.jpg");
        border-radius:15px;
       }
      </style>
      <form method="post" >
      <input type="submit" value="delete" name="deletestat" class="btn btn-primary" style="width:20px;height:20px; background-image:url('cross.png'); background-color:white;">
</form>


      <?php
    	echo "<br/>";
    	echo   " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$userstatus;
    	echo "<br/><br/>";
      ?>
      </div>
      <?php
        }
      }
    	?>

<?php

if(isset($_POST['deletestat']))
{
  $query=mysql_query("DELETE   FROM homestatus WHERE id='$statusid' ");
}



?>



</div>


<div class='friendlist' >
<?php

include'friendsatside.php';


?>

</div>













