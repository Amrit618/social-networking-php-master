<?php

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost" , "root" ,"");
mysql_select_db("friend_system");
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);

?>
<form method='post'>
<input type="text" name="asd" >
<input type="submit" name="search" value="search"  class="btn btn-danger" >
</form>



<?php
  if(isset($_POST['search'])){
  {
  if(preg_match("/^[  a-zA-Z]+/", $_POST['asd'])){
  $name=$_POST['asd'];

  $db=mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());

  $mydb=mysql_select_db("friend_system");

  $sql="SELECT  id,photo,fname, lname FROM users WHERE fname LIKE '%" . $name .  "%' OR lname LIKE '%" . $name ."%'";

  $result=mysql_query($sql);

  while($row=mysql_fetch_array($result)){
          $FirstName  =$row['fname'];
          $LastName=$row['lname'];
          $ID=$row['id'];
          $photophoto=$row['photo'];


  
  ?>
  <img src=<?php echo $row['photo'] ?> height='50' width='50' style="border-radius:20px 20px 20px 20px;"/>
  <?php
  echo "" . "<a href='../home/profilecheck.php?user=$ID'>"   .$FirstName . " " . $LastName .  "</a><br/>";
 
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>


