<?php
// Starting session_start for seesion varibles
session_start();

// when submit button got clicked ,includes connection.php and stores the form data into varibles using POST method
if (isset($_POST['submit'])){
    include 'connection.php';
    $email = $_POST['username'];
    $password = $_POST["password"];
// Time -- For updating last login time 
    date_default_timezone_set("Asia/Kolkata");
    $created_date = date("Y-m-d  H:i:s");
    $login_date = date("Y-m-d  H:i:s");
// fecting the row with matching email and password in datadase table
    $data = "SELECT * FROM `users` where `Email`='$email' and `Password`='$password'";
    $result = mysqli_query($conn,$data);
// If the $result is >0 then  it fetches the wanted data and stores them in variables and sets session variable 'username' and redirect to home page
    if(mysqli_num_rows($result)>0){
        $row  = mysqli_fetch_assoc($result);
        $name =strtoupper($row['Name']);
        $email = $row['Email'];
        $phone = $row['Phone'];
        $profile_url = $row['Profile_Url'];
        $_SESSION['username'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['profile'] = $profile_url;
        $_SESSION['email'] = $email;
       
        header("Location:./index.php");
    }
    // Update Login Time In Database
    $sql ="UPDATE `icode`.`users` SET `Last_Login`='$login_date' where `Email`='$email'";
    mysqli_query($conn,$sql);
  
}  

        
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="./img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Sign in to iCode athulcoder</title>
</head>
<style>
    html {
        font-size: 62.5%;
    }

    .container {
        max-width: 50rem;
        height: 70rem;
        overflow: hidden;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: 'Comfortaa', cursive;

    }

    .container img {
        max-width: 10rem;
        background-color: #fff;
        border: 2px solid black;
        border-radius: 50%;
    }

    h1 {
        font-size: 2.7rem;
        font-family: 'Comfortaa', cursive;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-width: 40rem;
        padding: 2rem 4rem;
        height: 23rem;
        border: 2px solid black;
        background-color: rgb(191, 191, 191);
        box-shadow: 0px 3px 10px 6px #a5a5a5;
    }
    form label{
        display: flex;
        width: 80%;
        justify-content: space-between;
        font-size: 1.2rem;
        margin: 1rem 0rem;
    }
    form input{
        width: 80%;
        height: 2.8rem;
    }
    form button{
        width: 82%;
        padding: .8rem 0;
        margin: 2rem 0;
    }
    .new{
        width: 36rem;
        margin: 2.5rem 0;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 3px 10px 6px #a5a5a5;
        padding: 2rem 6rem;
        font-size: 1.3rem;
    }
    .new p{
        margin-right: 1rem;
    }
    form #button{
        width: 84%;
        padding: .8rem 0;
        margin: 2rem 0;
        height:4rem;
        background-color: rgb(14, 125, 36);
        color: #fff;
        cursor: pointer;
        border-radius: 1rem;
    }
    button:hover{
        background-color: rgb(10, 136, 25);
    }
    #checkbox{
        width: 1.5rem;
    }
    .checkbox{
        width: 14rem;
        align-self: flex-end;
        display: flex;
        align-items: center;
    }
    @media only screen and (max-width:550px){
        form{
            min-width: 25rem;
        }
        h1{
            font-size: 2rem;
        }
    }
    @media only screen and (max-width:370px){
        form{
            min-width: 20rem;
            font-size: 1rem;

        }
        form label{
            width: 100%;
        }
        h1{
            font-size: 1.5rem;
        }
        img{
            width: 7rem;
        }
    }
    @media only screen and (max-width:290px){
        form{
            min-width: 16rem;
        }
    }
</style>

<body>
    <div class="container">
        <img src="./img/mylogo.png" alt="logo">
        <h1>Sign in to iCode athulcoder</h1>
        <form action="login.php" method="post">
            <label for="username-email">username or email address </label>
            <input type="text" name="username" id="username" required autocomplete="off" maxlength="30" minlength="2">
            <label for="password">password <a href="index.html">forgot password</a></label>
            <input type="password" name="password" id="password" required autocomplete="off" maxlength="16" minlength="8">
            <div class="checkbox"><input type="checkbox"  id="checkbox" onclick="show_password()">Show Password</div>
            <div style="color:red; font-size: 1.3rem; visibility:visible;"> <?php if(isset($result) && mysqli_num_rows($result)<=0){
                        echo 'Invaild Username or Password!';
                        }?>
            </div>
            <input type="submit" name="submit" id="button" value="Sign In">
        </form>

        <div class="new">
            <p>New to iCode?</p>
            <a href="signup.php">Create an account</a>
            <span> .</span>
        </div>
    </div>
</body>
<script src="./js/login.js"></script>
</html>