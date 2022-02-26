<?php
$me = $_SESSION['id'];
?>
<div class="panel panel-primary" style="width:200px;">
      <div class="panel-heading">Friendlist</div>
      </div>
<?php
 
echo "<hr/>";
$query = mysql_query("SELECT user_two FROM friend_list WHERE user_one='$me'");
while($row=mysql_fetch_assoc($query))
{

        $friends1= $row['user_two'];

      $query1=mysql_query("SELECT username from users where id=$friends1 ");
      $row1=mysql_fetch_array($query1);

      $friends11=$row1['username'];
      //echo $friends11;
      echo "<a href='message.php?user=$friends1'>$friends11</a>";
      echo "<br>";
    }
   

   ?>

   <?php

   $query = mysql_query("SELECT user_one FROM friend_list WHERE user_two='$me'");
while($row1=mysql_fetch_assoc($query))
{

        $friends2= $row1['user_one'];
        

      $query2=mysql_query("SELECT username from users where id=$friends2 ");
      $row12=mysql_fetch_array($query2);

      $friends22=$row12['username'];
      //echo $friends11;
      echo "<a href='message.php?user=$friends2'>$friends22</a>";
      echo "<br>";
    }
   



?>