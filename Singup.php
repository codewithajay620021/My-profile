<?php

include 'conn.php';
if (isset($_POST['save'])) 
{
    $uname = $_POST['1st'];
    $mail = $_POST['email'];
    $gender = $_POST['r1'];
    $phone = $_POST['phone'];
    $select = $_POST['select'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
     
     
    if ($pass )
    {
        $data = "SELECT * FROM `singupp` WHERE Name ='$uname'";
        $query = mysqli_query($conn, $data);
        $row = mysqli_num_rows($query);
        if ($row > 0) 
        {
            echo "User alreday exist";
        } else {

            $insert = " INSERT INTO `singupp`(`Name`,`Email`, `Pass`,`Cpass` ,`Mobile`, `Gender`, `State`) VALUES ('$uname','$mail','$pass','$cpass','$phone','$gender','$select')";
            $result = mysqli_query($conn, $insert);
            if ($result) {
                    ?>
                        <script>
                            alert("Data Insert");
                        </script>
                    <?php
            } else {
                    ?>
                        <script>
                            alert("Error!");
                        </script>
                    <?php
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
    <title>Responesiv Form</title>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Singup.css">
</head>

<body>

    <div class="continer">
        <h2>Sign Up</h2>
        <div class="form-continer">
            <form action="" method="POST">
                <div class="input-name">
                    <i class="fa fa-user lock"></i>
                    <input type="text" placeholder="Enter your name" class="name" name="1st">
                </div>
                
                <div class="input-name">
                    <i class="fa fa-envelope email"></i>
                    <input type="email" placeholder="Email" class="text-name" name="email">
                </div>

                <div class="input-name">
                    <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Password" class="text-name" name="password">
                </div>

                <div class="input-name">
                    <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Conforme Password" class="text-name" name="cpassword">
                </div>
               

                <div class="input-name">
                    <i class="fa fa-phone lock"></i>
                    <input type="text" placeholder="Phone Number" class="text-name" name="phone">
                </div>

                <div class="input-name">


                    <input type="radio" value="Male" class="radio-button" name="r1">
                    <label style="margin-right:30px;">Male</label>

                    <input type="radio" value="Female" class="radio-button" name="r1">
                    <label>Female</label>
                </div>

                <div class="input-name">
                    <select class="state" name="select">
                        <option>Select State</option>
                        <option>Bihar</option>
                        <option>Jharkhand</option>
                        <option>Uttar-Pradesh</option>
                        <option>Punjab</option>
                        <option>Delhi</option>
                    </select>
                    <div class="arrow"></div>
                </div>

                <div class="input-name">

                    <input type="submit" class="button" value="Register" name="save">

                </div>
            </form>
        </div>
    </div>
</body>
</html>