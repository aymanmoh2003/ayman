<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
ID:<input type="text" name="id" required><br>
name:<input type="text" name="name" required><br>
pass :<input type="text" name="pass" required><br>
<input type="submit" name="sub" value="Save">
</form>
<?php
$dsn="mysql:host=localhost;dbname=ayman";
$user="root";
$pass="";
$db = new PDO($dsn,$user,$pass);

if(isset($_POST['sub'])){
    $ID=$_POST['id'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    
$sql=$db->prepare("insert into student (id,name,pass) values(:i,:fn,:ln)");
    $sql->execute(array(
':i'=>$ID,
':fn'=>$name,
':ln'=>$pass,

    ));
}
?>
</body>
</html>