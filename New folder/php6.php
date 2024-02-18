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
Fname :<input type="text" name="fname" required><br>
Lname :<input type="text" name="lname" required><br>
Nots :<input type="text" name="nots" required><br>

<input type="submit" name="sub" value="Save">
</form>




<?php
$dsn="mysql:host=localhost;dbname=scool";
$user="root";
$pass="";
$db = new PDO($dsn,$user,$pass);
if(isset($_POST['sub'])){
    $ID=$_POST['id'];
    $Fname=$_POST['fname'];
    $Lname=$_POST['lname'];
    $Nots=$_POST['nots'];
$sql=$db->prepare("insert into emps (id,Fname,Lname,Nots) values(:i,:fn,:ln,:n)");
    $sql->execute(array(
':i'=>$ID,
':fn'=>$Fname,
':ln'=>$Lname,
':n'=>$Nots,

    ));
}
?>

</body>
</html>