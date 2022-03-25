<?php
include_once 'db.php';
$con = new DB_con();
$table = "users";
// data insert code starts here.
if(isset($_GET['edit_id']))
{
 $sql=mysql_query("SELECT * FROM users WHERE user_id=".$_GET['edit_id']);
 $result=mysql_fetch_array($sql);
}
// data update code starts here.
if(isset($_POST['btn-update']))
{
 $name = $_POST['name'];
 $password = $_POST['password'];

 
 $id=$_GET['edit_id'];
 $res=$con->update($table,$id,$name,$password);
if($res)
{
 ?>
<script>
alert('Record updated...');
        window.location='index.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error updating record...');
        window.location='index.php'
        </script>
  <?php
 }
}
// data update code ends here.

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Query Insert and Select Data </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="name" placeholder=" Name" value="<?php echo $result['name']; ?>"  /></td>
    </tr>
    <tr>
    <td><input type="text" name="password" placeholder=" password" value="<?php echo $result['password']; ?>" /></td>
    </tr>
    
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>