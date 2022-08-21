<?php
if (isset($_POST['save_edited'])){
    echo $_POST['save_edited'];
    echo $_POST['name'];
    
}
if(isset($_POST['save'])){
    echo $_POST['name'];
    echo $_POST['email'];
    echo $_POST['phone'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="trial.php" method='POST'>
        <input type="text" name="name" id="name">
        <input type="text" name="email" id="email">
        <input type="text" name="phone" id="phone">
        <input type="submit" name="save" id="save_btn">
    </form>
</body>
</html>

