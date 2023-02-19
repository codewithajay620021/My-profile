
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="updateReg.css">
</head>
<body>
    <h1>Student Registration</h1>
    <div class="container">
        <form action=" " method="POST">
            <div class="img">
                <img src="image/9348920.png" alt="Logo" width="150px">
            </div>

                <input type="text" name="Roll_no" placeholder="Enter Roll_Number" class="roll">
                <button name="search" class="btn">Search</button>
                <?php
                include 'conn.php';
                if(isset($_POST['search']))
                {
                    $s_Roll = $_POST['Roll_no'];
                    $s_Data = "SELECT * FROM `student_reg` WHERE Roll_No = $s_Roll";
                    $s_Query = mysqli_query($conn, $s_Data);
                    $s_Array = mysqli_fetch_array($s_Query);
                ?>

             
            

            <div class="input">
                <label for="">Roll No. :</label>
                <i class="fa fa-hashtag lock"></i>
                <input type ="text" class="input-text" name="roll" value="<?php echo $s_Roll?>" >
            </div>
            <div class="input">
                <label for="">Student Name:</label>
                <i class="fa fa-user lock"></i>
                <input type ="text" class="input-text"  name="sname" value="<?php echo $s_Array['Name'];?>"  >
            </div>
            <div class="input">
                <label for="">Father Name:</label>
                <i class="fa fa-users lock"></i>
                <input type ="text" class="input-text" name="fname"  value="<?php echo $s_Array['Fname'];?>">
            </div>
            <div class="input"> 
                <label for="">Mother Name:</label>
                <i class="fa fa-users lock"></i>
                <input type ="text" class="input-text" name="mname"  value="<?php echo $s_Array['Mname'];?>">
            </div>
            <div class="input">
                <label for="">Date Of Birth:</label>
                
                <input type ="date" class="input-text" name="dob"  value="<?php echo $s_Array['DOB'];?>">
            </div>
             <button class="btnn" name="save">Update</button> 
            <?php
        }
        ?>
        
        </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['save'])) 
{
    $up_roll = $_POST['roll'];
    $up_name = $_POST['sname'];
    $up_fname = $_POST['fname'];
    $up_mname = $_POST['mname'];
    $up_dob = $_POST['dob'];

    $up_data = "UPDATE `student_reg` SET `Roll_No`='$up_roll',`Name`='$up_name',`Fname`='$up_fname',`Mname`='$up_mname',`DOB`='$up_dob' WHERE `Roll_No`='$up_roll'";
    $up_query = mysqli_query($conn, $up_data);
    if ($up_query == true) 
    {
        ?>
         <script>
            alert("Update Successfull");
         </script>
        <?php
    }
    else
    {
        ?>
         <script>
            alert("Update failed");
         </script>
        <?php
    }
}

?>