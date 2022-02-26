<?php
mysql_connect("localhost" , "root" ,"");
mysql_select_db("friend_system");


?>
<form method='post'>
<input type="text" name="asd" >
<input type="submit" name="search" value="search" >
</form>



<?php
  if(isset($_POST['search'])){
  {
  if(preg_match("/^[  a-zA-Z]+/", $_POST['asd'])){
  $name=$_POST['asd'];

  $db=mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());

  $mydb=mysql_select_db("friend_system");

  $sql="SELECT  id, fname, lname FROM users WHERE fname LIKE '%" . $name .  "%' OR lname LIKE '%" . $name ."%'";

  $result=mysql_query($sql);

  while($row=mysql_fetch_array($result)){
          $FirstName  =$row['fname'];
          $LastName=$row['lname'];
          $ID=$row['id'];

  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n";
  echo "</ul>";
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>


