<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    </head>
<body>
    <form action=" " method="POST">
    <div class="main">
        <div class="navbar">
            <div class="menu">
                    <h2 class="icon"><img src="log-img/mbit-logo2.png"  width="90px" height="80px"></h2>
                <ul>
                    <li><a href="login.php">HOME</a></li>
                    <li>
                        <select name="select" class="about">
                            <option>About MBIT</option>
                            <option>Governing Council</option>
                            <option>Why MBIT</option>
                            <option>Our Moto</option>
                            <option>Our Founder</option>
                            <option>Our Vision</option>
                            <option>Our Mission</option>
                            <option>Chairmen's Massage</option>
                        </select>
                    </li>
                    <li>
                        <select name="select" class="about">
                            <option>Academic</option>
                            <option>Programme</option>
                            <option>Courses & Curriculum</option>
                            <option>Faculties & Features</option>
                            <option>Non Teching Staff</option>
                            <option>Feedback</option>
                        </select>
                    </li>
                    <li>
                        <select name="select" class="about">
                            <option>Campous</option>
                            <option>About Campous</option>
                            <option>Design & Development</option>
                            <option>Concept</option>
                            <option>Key Advantage</option>
                            <option>Location & Approch</option>
                            <option>Gallery</option>
                        </select>
                    </li>
                    <li>
                        <select name="select" class="about">
                            <option>Placement</option>
                            <option>About Placement</option>
                            <option>Local Placement</option>
                            <option>National Placement</option>
                            <option>International Placement</option>
                             
                        </select>
                    </li>
                    <li>
                        <select name="select" class="about">
                            <option class="opt">Contact Us</option>
                            <option class="opt">Forbesganj</option>
                            <option class="opt">Patna</option>
                            <option class="opt">Delhi & NCR</option>
                            <option class="opt">Nepal</option>
                            <option class="opt">Sydney,Australia</option>
                            <option class="opt">All Offices</option>
                            <option class="opt">Enquery Form</option> 
                            <option class="opt">Location & Approch</option> 
                             
                        </select>
                    </li>
                </ul>
            </div>
        </div>
        <div class="anim">
            <marquee behavior="alternate" direction="right" width="100%">ADMISSION IS GOING ON</marquee>
        </div>
        <div class="content">
            <a href=""></a>
            <h1>Moti Babu<br><span> Institute</span><br>Of Technology <span class="typed">And</span> </h1>
            <p class="par">This is the student Management system.<br>It's help to the college Management to Register New student<br> Fill student marks and it's campous performance <br> it is very help full for college or school management system?</p>

            <button class="cn"><a href="Reg.php">Register Here</a></button>
            <div class="form">
                <h2>Admin Login</h2>
                <input type="text" name="name" placeholder="Enter Email Here">
                <input type="password" name="pass" placeholder="Enter Password Here">
                <button name="save" class="btno">Admin-Login</button>
                <button name="submit" class="btno">Student-Login</button>

                <p class="link">Don't have an account<br>
                <a href="Adminlog.php">Admin Sing Up </a>Here</a></p>
                <p class="liw">Log in with</p>
                
                <div class="icons">
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                </div>
            </div> 
        </div>
    </div>
    </form>
    
 
</body>
</html>



<?php
include 'conn.php';
if(isset($_POST['save']))
{
    $userName = $_POST['name'];
    $userPassword = $_POST['pass'];
    $adminData = "SELECT * FROM `admin_login`";
    $Query = mysqli_query($conn, $adminData);
    $Res = mysqli_fetch_array($Query);
    $id = $Res['User'];
    $pwd = $Res['Password'];
    if($userName==$id && $userPassword == $pwd)
    {
        //header("location:admin.html");
            ?>
            <script>
                location.replace("admin.html");
                            </script>
            <?php
    }else {
       ?>
       <script>
        alert("User Id or Password Invalid!");
       </script>
       <?php
    }
}
?>

<?php
include 'conn.php';
if(isset($_POST['submit']))
{
    $userName = $_POST['name'];
    $userPassword = $_POST['pass'];
    $adminData = "SELECT * FROM `stu_login`";
    $Query = mysqli_query($conn, $adminData);
    $Res = mysqli_fetch_array($Query);
    $id = $Res['Email'];
    $pwd = $Res['Cpass'];
    if($userName==$id && $userPassword == $pwd)
    {
        //header("location:admin.html");
            ?>
            <script>
                location.replace("user.html");
                            </script>
            <?php
    }else {
       ?>
       <script>
        alert("User Id or Password Invalid!");
       </script>
       <?php
    }
}
?>