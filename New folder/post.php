<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  method="post">
    <input type="radio" name ="color" value="red">red :
    <input type="radio" name ="color" value="green">green : 
    <input type="radio" name ="color" value="blue">blue :
    <button type="submit" name ="change">change color
    <?php
    if(isset($_POST['change']))
    {echo " 
    <style>
    body{
        background:" .$_POST['color'] ."
    }";}
    
    ?>
</body>
</html>
