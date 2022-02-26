
//form nai post bhako chaina ta 

<?php
  echo "<PRE>";s

  print_r($_FILES);
  print_r($_POST);

  die();




$fetchid=mysql_query("SELECT id FROM users where username='".$_SESSION['username']."' ");
$row=mysql_fetch_array($fetchid);
$id=$row['id'];
if(isset($_POST['share_photo']))
{

  $file_name=$_FILES['profilepic']['name'];
  $file_type=$_FILES['profilepic']['type'];
  $file_size=$_FILES['profilepic']['size'];
  $file_tmp_name=$_FILES['profilepic']['tmp_name'];
  $destination = "photo/".$file_name;
  if($file_name)
  {
  
    move_uploaded_file($file_tmp_name, $destination);
    $sql=("INSERT INTO homestatus(user_id,photo) VALUES ('$id',$destination') ") ;
    
    if(mysql_query($sql) or die(mysql_error())){
      echo "successfully updated <br/>" ;
    }
    
  }
}
$sql     = "SELECT photo FROM homestatus ";
$res     = mysql_query($sql);
$records = mysql_fetch_array($res);
{
?>

    <img src=<?php echo $records['photo'] ?> height='200' width='200'/>     
  
<?php
}
?>

