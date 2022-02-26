<?php
session_start();


error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);

?>

<link rel="stylesheet" href="../style/bootstrap.min.css">
<script src="../js/bootstrap.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../home/home.php">Chautari</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../home/home.php">Home</a></li>
      <li><a href="../home/profile.php">Profile</a></li>
      <li><a href="../home/messageheader.php">messages</a></li>
      <li><a href="../friends/request.php">request</a></li>
       <li><a href="../friends/members.php">all users</a></li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../index.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>
      <li><a href="../home/accountsetting.php">account setting</a></li>
      
    </ul>
  </div>
</nav>







