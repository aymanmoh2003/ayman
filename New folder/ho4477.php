<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>






<body>
    <form method="post">
    <input type="submit" name="r" value="red">
    <input type="submit" name="r" value="green">
    <input type="submit" name="r" value="blue">
<?php

if(isset($_POST['r']))
{
    echo "
    <style>
    body{background:" . $_POST["r"]."
}";
}
?>
</body>
</html>