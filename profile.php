<?php
    session_start();
    if(isset($_POST['save'])){
        $_SESSION['profile'] = 'choosed';
        include 'connection.php';
        $img_name = $_FILES['dp']['name'];
        $img_size = $_FILES['dp']['size'];
        $tmp_name = $_FILES['dp']['tmp_name'];
        $error = $_FILES['dp']['error'];
    
    if($error == 0){

        if($img_size>1000000){
            $em = "File too large";
            header('Location: profile.php?error='.$em);
        }
        else{
            $img_extension = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_extension = strtolower($img_extension);

            $allowed_extensions = ['jpg','png','jpeg'];

            if(in_array($img_extension,$allowed_extensions)){
                $new_img_name = uniqid('IMG-',true).".".$img_extension;

                $img_upload_path = './users_profile/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);

                // save path to database
                $user_email = $_SESSION['email'];
                 if($_SESSION['profile']=="choosed"){
                    $_SESSION['profile'] = $img_upload_path;
                    $sql ="UPDATE `icode`.`users` SET `Profile_Url`='$img_upload_path' where`Email`='$user_email'";
                    mysqli_query($conn,$sql);    
                 }

            }

        }
    }
    
    }

    if(isset($_POST['save_edited'])){
        include 'connection.php';
        $user_email = $_SESSION['email'];
        $edited_name = $_POST['name'];
        $edited_email = $_POST['email'];
        $edited_phone = $_POST['phone'];

        $sql ="UPDATE `icode`.`users` SET `Name`='$edited_name' and `Email`='$edited_email' and `Phone`= '$edited_phone' where `Email`='$user_email'";
         $result =mysqli_query($conn,$sql);
         if($result=false){
            echo "failed";
         }
         if($result=true){
            echo 'done';
         }
         else{
            echo 'updated';
         }

  

        $_SESSION['username'] = $edited_name;
        $_SESSION['email'] = $edited_email;
        $_SESSION['phone'] = $edited_phone;

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="athulcoder,athulcoder.github.io,athul,code with athul,athul,athul sabu,coder,programmer,github athulcoder,github athul sabu,codewithicode,icode,icode athulcoder,coder athul,at code,athul programmer,athul sabu, python athulcoder, php athulcoder, athul sabu athulcoder, javascript athulcoder, python athul,mysql athulcoder,more athulcoder,contact athulcoder,reach athulcoder, instagram athulcoder, facebook athulcoder , twitter athulcodr,computer science athulcoder,coder athul sabu,github code athul,class athulcoder,search athulcoder, Athulcoder blog, athulcoder insta,athulcoder social media, athulcoder website,athul sabu instagram,coders,coding, location athulcoder,athul icode sabu, computer science student, github turtle,github backend ,athul sabu website , athulcoder country,athulcoder age, code with me,hacking ,web Development, data Science , athulcoder editor, at coder athulcoder, athulcoder in github, github more athul, athul, sabu, coder dude , crazy coder,about athulcoder,learn athulcoder ,contact athul sabu , pay athulcoder, wish athulcoder,athulcoder athul sabu, athul sabu age, athul sabu tech name, athulcoder job, who is athulcoder ,who is athul sabu , athulcoder india,athulcoder kerala,kerala coder,kerala programmers,kerala computer science ,data science kerala , more athul ,more , how to get athulcoder">
    <meta name="description"
        content="iCode|athulcoder is a professional website created by Athul Sabu as his personal Blog.In this beautiful website you are able to see wide-varieties of tips and tricks regarding Computer Science ,Web Development, Machine Learning ,Artificial Intelligence,Data Science and so on.If you are interested in IT and much more in technology then this blog is for you. I welcome you to Explore...">
    <link rel="icon" href="./img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/brands.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <title>iCode athulcoder</title>
</head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@200&display=swap');
#hero{
    height:100vh;
    overflow-y:hidden;
}
#setting {
    width: 91%;
    height: 50rem;
    background: black;
    margin: auto;
    margin-bottom:4rem;
    margin-top: 7rem;
    color: white;
    box-shadow: 0px 7px 9px 7px #c4afaf;
}

.pr_box {
    background: transparent;
    height: 20rem;
    width: 30rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding-left: 2rem;
    font-size: 1.6rem;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

label {
    color: beige;
}

.head {
    color: white;
    font-size: 3rem;
    font-family: 'Montserrat', sans-serif;
    margin: 0 2rem;
    padding: 1rem 1rem;

}

#c_pic {
    width: 12rem;
    background-color: white;
    border-radius: 50%;
    border: 2px solid black;
    margin-top: 1rem;
    margin-bottom: 1rem;

}

.rws {
    display: flex;
    width: 100%;
    align-items: center;
    margin-bottom: 1rem;
}

.rws input,
.rws p {
    font-family: 'Mukta', sans-serif;
    font-weight: bold;
    background-color: transparent;
    color: #fff;
    outline: none;
    border: none;
    font-size:1.5rem;
    width:23rem;

}

.rws span {
    color: rgb(212, 212, 212);
    font-family: 'Mukta', sans-serif;
    padding-right: 1rem;

}

.rws i {
    margin-left: .4rem;
}

.rws i:hover {
    cursor: pointer;
    color: bisque;
}

#save_btn {
    background-color: blue;
    width: 6rem;
}

#cancel_btn {
    background-color: red;
    margin-left: 2rem;
    width: 6rem;
}

#save_btn,
#cancel_btn:hover {
    cursor: pointer;
}



#file {
    display: none;
}

#upload_btn {
    cursor: pointer;
    position: relative;
    bottom: 16px;
    left: -29px;
    color: white;
    font-size: 1.5rem;
}
#upload_btn:hover{
    color: rgb(183, 183, 183);
}
.img{
    width:12rem;
    height:12rem;
    border-radius:50%;
    border:2px solid white;
}
#save_btn_2 {
  cursor: pointer;
  width: 12rem;
  padding: .3rem 1rem;
    padding-top: 0.3rem;
    padding-right: 1rem;
    padding-bottom: 0.3rem;
    padding-left: 1rem;
  margin: 1rem 0;
  background-color: green;
  border: 2px solid #978f8f;
  border-radius: 2rem;
  display: none;
  color: white;
  font-weight: bold;
}
#edit-form{
    display:none;
}
</style>
<body>
    <section id="hero">
        <div class="load"></div>
        <header>
            <nav>
                <section class="sub-nav">
                    <div class="logobox">
                        <img src="./img/mylogo.png" alt="logo" class="logo">
                        <h1><span>i</span>Code <span>athulcoder</span></h1>
                    </div>

                    <div class="menubox">
                        <div class="main-list-box">
                            <ul>
                                <li><a href="./index.php">home</a></li>
                                <li><a href="contact.html">contact</a></li>
                                <li><a href="">gallery</a></li>
                                <li><a href="">about</a></li>
                            </ul>
                            <button id="login" class="btn3" onclick="window.open('./login.php','_self')">Login</button>
                            <button id="signup" class="btn3" onclick="window.open('./signup.php','_self')">Signup</button>
                        </div>

                    </div>
                </section>
                <section class="down-nav">
                    <i class="fa-solid fa-bars" id="list-btn" onclick="list()"></i>
                    <div class="searchbar">
                        <input type="search" placeholder="Search" name="search" id="search">
                        <i class="fa-solid fa-magnifying-glass" id="searchbtn"></i>
                    </div>
                </section>
            </nav>
        </header>
        <div id="list-box" class="list_box">
            <div class="profile">
                <div class="close">

                    <label class="switch">
                        <input type="checkbox" id="toggle_btn" checked><span class="s-mover"></span>

                    </label>

                    <i class="fa-solid fa-close" id="closebtn" onclick="closer()"></i>
                </div>
                <img src="./img/mylogo.png" alt="" class="logo2" id="m_logo">
                <h3 id = "user">
                    <?php
                    
                     if (!isset($_SESSION['username'])){
                        echo"i<span style='color:white'>Code</span> <br>athulcoder";
                        
                     }   
                    else if ($_SESSION['username'] != ""){
                        print_r($_SESSION['username']);
                        $profile = $_SESSION['profile'];
                        echo "<script>
                                document.getElementById('login').style.display = 'none';
                                document.getElementById('signup').style.display = 'none';
                        </script>";
                        if($profile != null){
                            echo "<script>document.getElementById('m_logo').setAttribute('src','$profile')</script>
                            ";
                        }
                        else{
                            echo "<script>document.getElementById('m_logo').setAttribute('src','./img/mylogo.png')</script>
                            ";
                        }
                        }
                    ?>
                </h3>
            </div>
            <ul id="item">
                <li><i class="fa-solid fa-house"></i><a href="./index.php">Home</a></li>
                <li><i class="fa-solid fa-user"></i><a href="./profile.php">Account</a></li>
                <li><i class="fa-solid fa-user"></i><a href="../about">About</a></li>
                <li><i class="fa-solid fa-phone"></i><a href="./contact.html">Contact</a></li>
                <li><i class="fa-brands fa-envira"></i><a href="../gallery.html">Gallery</a></li>
                <li><i class="fa-solid fa-arrows"></i><a href="">Social</a></li>
                <li><i class="fa-solid fa-book"></i><a href="">Learn</a></li>
                <li><i class="fa-solid fa-computer"></i><a href="">Tech</a></li>
                <li><i class="fa-solid fa-inbox"></i><a href="./login.php">Login</a></li>
                <li><i class="fa-solid fa-sign"></i><a href="./signup.php">Signup</a></li>
                <li><i class="fa-brands fa-github"></i><a href="https://github.com/athulcoder"
                        target="_blank">Github</a></li>
                <li><i class="fa-brands fa-instagram"></i><a href="https://instagram.com/athul_._sabu"
                        target="_blank">Instagram</a></li>
                <li><i class="fa-brands fa-twitter"></i><a href="https://twitter.com/athulcoder"
                        target="_blank">Twitter</a></li>

            </ul>
        </div>


        <section id="setting">
        <h1 class="head">Account</h1>
        <hr>
        <h3 style="font-size:1.5rem; color:rgb(111, 110, 107)" class="head">Profile</h3>

        <div class="pr_box">
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="dp_box">
                    <img src="./img/dp.png" alt="" id="c_pic">
                    <label for="file"><i class="fas fa-camera" id="upload_btn"></i></label>
                    <input type="file" name="dp" id="file" class="file" accept="image/*">
                    <input type="submit" name="save" id="save_btn_2" value="Upload Profile">
                </div>
            </form>
            <form action="profile.php" method="post" id="display-form">
    <div class="rws">
        <input type="text" name="name" id="name" placeholder="Name" disabled style="text-transform:uppercase"> 
        <!-- <i id="edit_pen" class="fa-solid fa-pen"onclick="edit_name()" ></i> -->
    </div>
    <div class="rws">
        <span>E-mail</span> <input type="email" name="email" id="email" placeholder="E-mail" disabled>
    </div>
    <di class="rws">
        <span>Phone</span> <input type="text" name="phone" id="phone" placeholder="Phone" disabled>
    </di>
    </form>
<!-- form 2 -->
<form action="profile.php" method="post" id="edit-form">
    <div class="rws">
    <input type="text" name="name" id="name" placeholder="Name" style="text-transform:uppercase">
    </div>
    <div class="rws">
        <span>E-mail</span> <input type="email" name="email" id="email" placeholder="E-mail" >
    </div>
    <di class="rws">
        <span>Phone</span> <input type="text" name="phone" id="phone" placeholder="Phone" >
    </di>
    <div class="rws">
        <input type="submit" id="save_btn" value="Save" name="save_edited">
        <input type="button" value="Cancel" id="cancel_btn">
    </div>
</form>
        </div>

    </section>
           
        </section>

</body>
<script>
    // listing button
let listbox = document.getElementById('list-box')
function list() {
    list_box_width = window.getComputedStyle(listbox).width
    let listitem = document.getElementById('item')
    let listbtn = document.getElementById('list-btn')
    if (true) {
        listbox.style.display = 'block'
        document.getElementById('item').style.display = 'flex';
        listbox.classList.add('list')
        listbox.classList.remove('unlist')
    }

}
function closer() {
    listbox.classList.remove('list')
    listbox.style.display = 'none'
    document.getElementById('item').style.display = 'none';
}

// Mode Changer
function mode_changer() {
    let root = document.querySelector(":root");
    let sift_btn = document.getElementById('toggle_btn');
    if (sift_btn.checked == false) {
        root.style.setProperty('--p-color', 'rgb(255, 60, 0);')
        root.style.setProperty('--s-color', 'rgb(4, 20, 59)')
        root.style.setProperty('--theme-1-color', 'rgb(222, 222, 222)')
        root.style.setProperty('--side-color', 'rgb(9, 55, 118)')
        root.style.setProperty('--text-main-color', '#000')
        document.getElementById('hero').style.backgroundColor = 'white'
    }
    else if (sift_btn.checked == true) {
        root.style.setProperty('--s-color', 'black')
        root.style.setProperty('--theme-1-color', 'rgb(31, 29, 29)')
        root.style.setProperty('--side-color', 'rgb(31, 29, 29)')
        root.style.setProperty('--text-main-color', '#fff')
        document.getElementById('hero').style.backgroundColor = 'rgb(52, 52, 52)'
    }
}
setInterval(mode_changer, 100)

</script>
<script>
    function edit_name() {
        document.getElementById('name').style.border = '2px solid white';
        document.getElementById('name').disabled = false;
        document.getElementById('email').style.border = '2px solid white';
        document.getElementById('email').disabled = false;
        document.getElementById('phone').style.border = '2px solid white';
        document.getElementById('phone').disabled =false;
        document.getElementById('edit_pen').style.display = 'none'
        document.getElementById('display-form').style.display = 'none'
        document.getElementById('edit-form').style.display = 'block'

    }
    document.getElementById('save_btn').onclick = function () {
        document.getElementById('name').style.border = 'none';
        document.getElementById('name').disabled = true;
        document.getElementById('email').style.border = 'none';
        document.getElementById('email').disabled = true;
        document.getElementById('phone').style.border = 'none';
        document.getElementById('phone').disabled = true;
        document.getElementById('edit_pen').style.display = 'inline'

    }
    document.getElementById('cancel_btn').onclick = function () {
        document.getElementById('name').value = "<?php echo strtoupper($_SESSION['username']) ?>"
        document.getElementById('name').style.border = 'none';
        document.getElementById('name').disabled = true;
        document.getElementById('email').style.border = 'none';
        document.getElementById('email').disabled = true;
        document.getElementById('phone').style.border = 'none';
        document.getElementById('phone').disabled = true;
        document.getElementById('edit_pen').style.display = 'inline'
        document.getElementById('email').value = "<?php echo $_SESSION['email'] ?>"
        document.getElementById('phone').value = "<?php echo $_SESSION['phone'] ?>"
        document.getElementById('display-form').style.display = 'block'
        document.getElementById('edit-form').style.display = 'none'

    }

    let file = document.getElementById('file')
    let current_pic = document.getElementById('c_pic')
    let upload_btn = document.getElementById('upload_btn')
    file.addEventListener('change',function(){
        const choosed_file = this.files[0];

        if(choosed_file){
            const reader = new FileReader();

            reader.addEventListener('load',function(){
                current_pic.setAttribute('src',reader.result)
            });
            reader.readAsDataURL(choosed_file);
            document.getElementById('save_btn_2').style.display = 'inline';
        }

    })
</script>
</html>
<?php
if ($_SESSION['username'] != ""){
    $profile_name = strtoupper($_SESSION['username']);
    $profile_email = $_SESSION['email'];
    $profile_phn = $_SESSION['phone'];
    $profile_pic = $_SESSION['profile'];
    echo "<script>
            document.getElementById('login').style.display = 'none';
            document.getElementById('signup').style.display = 'none';
            document.getElementById('name').value = '$profile_name'
            document.getElementById('email').value = '$profile_email'
            document.getElementById('phone').value = '$profile_phn'
    </script>";
    if($profile_pic != null){
        echo "<script>document.getElementById('c_pic').setAttribute('src','$profile_pic') 
        </script>";
   }
   else if($_SESSION['profile'] ==null){
        echo "<script>document.getElementById('c_pic').setAttribute('src','./img/dp.png') 
        </script>";

        
}
}
?>

