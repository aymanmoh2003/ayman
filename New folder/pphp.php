<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<body>
<form method="post">
ID:<input type="text" name="id" required><br>
name:<input type="text" name="name" required><br>
subjects	 :<input type="text" name="subjects	" required><br>
<input type="submit" name="sub" value="Save">
</form>

<?php
$dsn="mysql:host=localhost;dbname=univercity";
$user="root";
$pass="";
$db = new PDO($dsn,$user,$pass);

if(isset($_POST['sub'])){
    $ID=$_POST['id'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    
$sql=$db->prepare("insert into student (id,name,subjects) values(:i,:fn,:ln)");
    $sql->execute(array(
':i'=>$ID,
':fn'=>$name,
':ln'=>$subjects,

    ));
}
?>
</body>
</html>