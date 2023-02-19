<?php
    include 'conn.php';
    $reg="AKU/2022/BCA ";
    $data="SELECT * FROM `student_reg` ORDER BY Roll_No DESC LIMIT 1";
    $query=mysqli_query($conn,$data);
    $row=mysqli_fetch_array($query);
    $roll=$row['Roll_No'];
    $uroll=$roll+1;
    $ureg=$reg.$uroll;
    $rno=rand(10000,500000);
    $ureg=$reg.$rno;

    if(isset($_POST['save']))
    {
    $inroll=$_POST['roll'];
    $inreg=$_POST['reg'];
    $sname=$_POST['sname'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $dob=$_POST['dob'];
    $image=$_FILES['image'];
    $filename=$image['name'];
    $filepath=$image['tmp_name'];
    $fileError=$image['error'];

    if($fileError==0)
    {
        $filelocat='image/'.$filename;
        move_uploaded_file($filepath,$filelocat);
        $indata="INSERT INTO `student_reg`(`Roll_No`, `Reg_No`, `Name`, `Fname`, `Mname`, `DOB`, `Image`)VALUES ('$inroll','$ureg','$sname','$fname','$mname','$dob','$filelocat')";
        
        $univQuery=mysqli_query($conn,$indata);
        if($univQuery==true){
            ?>
            <script>
                alert("Data Has Been Inserted");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Error !");
            </script>
            <?php
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
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <button class="btnn"><a href="admin.html">Home</a></button>
    <h1>Student Registration</h1>
    <div class="container">
        <form action=" " method="POST" enctype="multipart/form-data">
            <div class="img">
                <img src="image/9348920.png" alt="Logo" width="150px">
            </div>

            <div class="form">
                <label for="">Registration No. :</label>
                <i class="fa fa-hashtag lock"></i>
                <input type ="text" name="reg" value="<?php echo $ureg?>" readonly>
            </div>
            
            <div class="form">
                <label for="">Roll No. :</label>
                <i class="fa fa-hashtag lock"></i>
                <input type ="text" name="roll" value="<?php echo $uroll?>" readonly>
            </div>

            <div class="form">
                <label for="">Student Name:</label>
                <i class="fa fa-user lock"></i>
                <input type ="text" name="sname" placeholder="Enter Student Name">
            </div>

            <div class="form">
                <label for="">Father Name:</label>
                <i class="fa fa-users lock"></i>
                <input type ="text" name="fname" placeholder="Enter father's Name">
            </div>
    
            <div class="form"> 
                <label for="">Mother Name:</label>
                <i class="fa fa-users lock"></i>
                <input type ="text" name="mname" placeholder="Enter mother's Name">
            </div>
             
            <div class="form">
                <label for="">Date Of Birth:</label>
                
                <input type ="date" name="dob" placeholder="Enter DOB">
            </div>
             
            <div class="form">
                <label for="">Image File:</label>
                 
                <input type ="file" name="image">
            </div>

            <input type ="submit" name="save" value="Submit" class="btn"> 
            
        </form>
    </div>
     
</body>
</html>