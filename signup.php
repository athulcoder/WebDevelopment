<?php
// Starting session_start for seesion varibles
session_start();

// When Submit Button 

 if (isset($_POST['submit'])){
    // includes connection.php for creating connection with database
    include 'connection.php';
    // Storing the Data from the form in variables
    $email = $_POST['email'];
    $user = $_POST["name"];
    $password = $_POST['password'];
    $phone = $_POST["phone"];
    $profile_url = null;
    // Time -- For Getting the Account Created Time 
    date_default_timezone_set("Asia/Kolkata");
    $created_date = date("Y-m-d  H:i:s");
    $login_date = date("Y-m-d  H:i:s");
    // Defining the table and row for storing data.
    $sql ="INSERT INTO `icode`.`users` (`Name`, `Email`, `Phone`, `Password`,`Created_Date`,`Last_Login`) VALUES ( '$user', '$email', '$phone', '$password', '$created_date', '$login_date');";
    // using mysqli_query() storing data into database table.After Saving Data session variable 'username' get defined and Redirect to home page 
    if($conn->query($sql)==(true)){
        $_SESSION['username'] =strtoupper($user);
        $_SESSION['phone'] = $phone;
        $_SESSION['profile'] = $profile_url;
        $_SESSION['email'] = $email;
       
        header("Location:./index.php");
        echo "<script> alert('Account Created Successfully')
        window.open('index.php','_self')
        </script>";
        
    }
    // If data was failed to save 
    else{
        echo "failed";
    }
        
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <title>New Account |iCode athulcoder</title>
</head>
<style>
    html {
        font-size: 62.5%;
    }

    .container {
        max-width: 50rem;
        height: 58rem;
        margin: auto;
        display: flex;
        flex-direction: column;
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
        min-width: 30rem;
        background-color: rgb(191, 191, 191);
        padding: 2rem 2rem;
        height: 44rem;
        border: 2px solid black;
        box-shadow: 0px 3px 10px 6px #a5a5a5;
    }

    form label {
        display: flex;
        align-self: flex-start;
        width: 25%;
        justify-content: space-between;
        font-size: 1.2rem;
        margin: 1rem 0rem;
    }

    form label i {
        margin-right: 1rem;
    }

    form input {
        width: 70%;
        height: 2.5rem;
        padding: .6rem 1rem;
        border-radius: .5rem;
        outline: none;
        border: 1px solid black;
    }

    form button {
        width: 84%;
        padding: .8rem 0;
        margin: 2rem 0;
        background-color: rgb(14, 125, 36);
        color: #fff;
        cursor: pointer;
        border-radius: 1rem;
    }

    button:hover {
        background-color: rgb(10, 136, 25);
    }

    #checkbox {
        width: 1.5rem;
        height: 3rem;
    }

    .checkbox {
        width: 14rem;
        align-self: flex-end;
        display: flex;
        align-items: center;
    }

    .old {
        font-size: 1.3rem;
    }

    .error {
        color: red;
        font-family: sans-serif;
        font-size: 1rem;
        width: 98%;
        background-color: transparent;
        display: none;
        align-items: center;
        justify-content: center;
    }

    @media only screen and (max-width:390px) {
        form {
            min-width: 22rem;
        }
    }

    @media only screen and (max-width:270px) {
        form {
            min-width: 15rem;

        }

        h1 {
            font-size: 2rem;
        }
    }
</style>

<body>
    <div class="container">
        <img src="./img/mylogo.png" alt="logo">
        <h1>New Account</h1>
        <form action="signup.php" method="post">
          
            <label for="name"><i class="fa-solid fa-user"></i>Name </label>
            <input type="text" name="name" id="name" required maxlength="120" autocomplete="off" placeholder="Name" style="text-transform:uppercase">
            <label for="email"><i class="fa-solid fa-envelope"></i>E-mail </label>
            <input type="email" name="email" id="email" required maxlength="60" autocomplete="off" placeholder="E-mail">
            <label for="phone"> <i class="fa-solid fa-mobile-screen"></i>Phone </label>
            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" name="phone" id="phone" required maxlength="10"
                autocomplete="off" placeholder="Phone" onchange="">
            <label for="password"> <i class="fa-solid fa-lock"></i> Password </label>
            <input type="password" name="password" id="password" required autocomplete="off" maxlength="16"
                minlength="8" placeholder="Password">
            <label for="cnfrm-pass"> <i class="fa-solid fa-lock"></i>Confirm</label>
            <input type="password" name="cnfrm-pass" id="cnfrm-pass" required autocomplete="off" maxlength="16"
                minlength="8" placeholder="Confirm Password">
            <div class="checkbox"><input type="checkbox" id="checkbox" onclick="show_password()">Show Password</div>
            <div class="error" id="error">
                <p id="er_msg"></p>
            </div>
            <button onclick="check()" name="submit">Create</button>
          
        </form>

        <div class="old">
            <p>Already have an account? <a href="./login.php">login</a></p>
        </div>
    </div>
</body>
<script src="./js/login.js"></script>
<script>
    function check() {
        f_pass = document.getElementById('password').value;
        con_pass = document.getElementById('cnfrm-pass').value;
        email = document.getElementById('email').value;
        error_box = document.getElementById('error')
        er_msg = document.getElementById('er_msg')
        console.log(f_pass, con_pass)
        console.log('email ===' + email)
        if (f_pass == con_pass && f_pass != "") {
        }
        else if (email ==""){
            er_msg.innerHTML = "Email is must. Please enter your email"
        }
        else if (email.indexOf("@") < 1) {
            er_msg.innerHTML = "Invaild E-mail Entered"
        
        }
        else if (f_pass != con_pass) {

            er_msg.innerHTML = "password doesn't match"
           
        }

        error_box.style.display = "flex"
    }
    function num_only() {
  

    }
</script>



</html>


