<?php

 include 'conn.php';

if(isset($_POST['save']))
{
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if($pass)
    {
        $data = "SELECT * FROM `admin_login` WHERE User_Name = '$uname'";
        $admin = mysqli_query($conn, $data);
        $result = mysqli_fetch_array($admin);
        if($result > 0)
        {
             
            echo "User Already Exist";
             
        }
        else{
            $insert = "INSERT INTO `admin_login`(`User_Name`, `Password`, `Cpassword`) VALUES ('$uname','$pass','$cpass')";
            $res = mysqli_query($conn, $insert);
            if($res)
            {
                 
                    echo "Loging Successfull";
                 
            }
            else{
                 
                    echo "Login Filed !";
                 
            }
        }


    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sing Up</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="Adminlog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 
    <div class="container">
        <h1>Admin Sing-Up</h1>
        <div class="form">
            <img src="log-img/personal-security.png" alt="" width="200px">
            <form action="" method="POST">
                <label for="username">User Name :</label><br>
                <input type="text" placeholder="Enter Username" name="uname" class="text-input">
                <br>
                <label for="password">Password :</label><br>
                <input type="password" placeholder="Enter Password" name="pass" class="text-input">
                <br>
                <label for="cpassword">Cpassword :</label><br>
                <input type="password" placeholder="Enter Password" name="cpass" class="text-input">
                <br>
                <input type="submit" class="btn" value="Register" name="save">
            </form>
        </div>
    </div>
</body>
</html>