 <?php
    session_start();

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
                <li><i class="fa-solid fa-house "></i><a href="">Home</a></li>
                <?php 
                    if(isset($_SESSION['username'])){
                        echo ' <li><i class="fa-solid fa-user"></i><a href="./profile.php">Account</a></li>';
                    }
                 ?>
                <li><i class="fa-solid fa-user"></i><a href="">About</a></li>
                <li><i class="fa-solid fa-phone"></i><a href="./contact.html">Contact</a></li>
                <li><i class="fa-brands fa-envira"></i><a href="">Gallery</a></li>
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
        <section class="main-con" id="main-bg" onclick="closer()">
            <div class="content">
                <span>Welcome to</span>
                <h1><span style="color:rgb(255, 81, 0);">i</span>Code athulcoder</h1>
                <p class="tagline">"Glow the mind and explore"</p>
                <p class="m-para">If you are searching for a best blog experience <br> then this is for you. just
                    explore
                    it.</p>
                <button class="btn">Explore</button>
            </div>
            <div class="slider">
                <div id="s1" class="bg-active"></div>
                <div id="s2" class="bg-inactive"></div>
                <div id="s3" class="bg-inactive"></div>
                <div id="s4" class="bg-inactive"></div>

            </div>

        </section>
        <h1 class="head1">Learn New</h1>
        <section class="tech" onclick="closer()">

            <div class="card">
                <img src="./img/web.jpg" alt="web development">
                <h5 class="subject">Web Development</h5>
                <p class="desc">Web development is the work involved in developing a website for the Internet or an
                    intranet. Web development can range from developing a simple single static page of plain text to
                    complex web applications.</p>
                <button class="btn2" onclick="visit(1)">visit</button>
            </div>

            <div class="card">
                <img src="./img/sd.jpg" alt="software development">
                <h5 class="subject">Software Development</h5>
                <p class="desc">Software development is the process of conceiving, specifying, designing, programming,
                    documenting, testing, and bug fixing involved in creating and maintaining applications, frameworks,
                    or other software components.</p>
                <button class="btn2" onclick="visit(2)">visit</button>
            </div>

            <div class="card">
                <img src="./img/st.jpg" alt="software testing">
                <h5 class="subject">Software Testing</h5>
                <p class="desc">Software testing is the act of examining the artifacts and the behavior of the software
                    under test by validation and verification. Software testing can also provide an objective,
                    independent view of the software to allow the business to appreciate and understand the risks of
                    software implementation.</p>
                <button class="btn2" onclick="visit(3)">visit</button>
            </div>
        </section>

        <section class="tech">
            <div class="card">
                <img src="./img/ds.jpg" alt="data science">
                <h5 class="subject">Data Science</h5>
                <p class="desc">Data science is an interdisciplinary field that uses scientific methods, processes,
                    algorithms and systems to extract knowledge and insights from noisy, structured and unstructured
                    data, and apply knowledge from data across a broad range of application domains.</p>
                <button class="btn2" onclick="visit(4)">visit</button>
            </div>

            <div class="card">
                <img src="./img/seo.png" alt="seo">
                <h5 class="subject">SEO</h5>
                <p class="desc">Search engine optimization is the process of improving the quality and quantity of
                    website traffic to a website or a web page from search engines. SEO targets unpaid traffic rather
                    than direct traffic or paid traffic.</p>
                <button class="btn2" onclick="visit(5)">visit</button>
            </div>

            <div class="card">
                <img src="./img/dbms.webp" alt="dbms">
                <h5 class="subject">DBMS</h5>
                <p class="desc">Database Management Systems (DBMS) are software systems used to store, retrieve, and run
                    queries on data. A DBMS serves as an interface between an end-user and a database, allowing users to
                    create, read, update, and delete data in the database.</p>
                <button class="btn2" onclick="visit(6)">visit</button>
            </div>
        </section>

        <footer>
            <div class="last">
                <img src="./img/mylogo.png" alt="">
                <p>copyrigth &copy; athulcoder.github.io</p>
            </div>
            <div class="icons">
                <a href="https://github.com/athulcoder" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.facebook.com/athul.sabu.79677" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://instagram.com/athul_._sabu" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://twitter.com/athulcoder" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            </div>

        </footer>
    </section>
</body>
<script src="./js/main.js"></script>

</html>