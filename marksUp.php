<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Update</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="marksUp.css">
</head>

<body>
    <button class="btn1"><a href="admin.html">Home</a></button>
        <h1>Marks Update</h1>
        <div class="main">
            <form action="" method="POST">
                <input type="text" name="roll" class="srch" placeholder="Enter Roll Number">
                <button name="sear" class="btnn">Search</button>
                <?php
            include "conn.php";
            if(isset($_POST['sear']))
            {
                $marks_Roll = $_POST['roll'];
                $marks_Data = "SELECT * FROM `marks` WHERE roll_no = $marks_Roll";
                $marks_Query = mysqli_query($conn, $marks_Data);
                $marks_Array = mysqli_fetch_array($marks_Query);

            ?>

                <div class="input">
                    <label for="">Roll No. :</label>
                    <input type="text" name="roll_no" value="<?php echo $marks_Roll ?>" class="input-text">
                </div>
                <div class="input">
                    <label for="">Hindi :</label>
                    <input type="text" name="hindi" value="<?php echo $marks_Array['Hindi'];  ?>" class="input-text">
                </div>
                <div class="input">
                    <label for="">English :</label>
                    <input type="text" name="eng" value="<?php echo $marks_Array['English'];  ?>" class="input-text">
                </div>
                <div class="input">
                    <label for="">Math :</label>
                    <input type="text" name="math" value="<?php echo $marks_Array['Math'];  ?>" class="input-text">
                </div>
                <div class="input">
                    <label for="">Science :</label>
                    <input type="text" name="sci" value="<?php echo $marks_Array['Science'];  ?>" class="input-text">
                </div>
                <div class="input">
                    <label for="">Social Science :</label>
                    <input type="text" name="ssci" value="<?php echo $marks_Array['Sscience'];  ?>" class="input-text">
                </div>
                <div class="input">
                    <label for="">Sanskrit :</label>
                    <input type="text" name="san" value="<?php echo $marks_Array['Sanskrit'];  ?>" class="input-text">
                </div>

                <button value="update" name="update" class="btn">Update</button>
                <?php
        }
        ?>
            </form>
        </div>
     
</body>

</html>

<?php
if(isset($_POST['update']))
{
    $Up_Roll = $_POST['roll_no'];
    $up_hindi = $_POST['hindi'];
    $up_eng = $_POST['eng'];
    $up_math = $_POST['math'];
    $up_sci = $_POST['sci'];
    $up_ssci = $_POST['ssci'];
    $up_san = $_POST['san'];

    $up_data = "UPDATE `marks` SET  `roll_no`=' $Up_Roll', `Hindi`='$up_hindi ',`English`='$up_eng ',`Math`='$up_math ',`Science`='$up_sci ',`Sscience`='$up_ssci ',`Sanskrit`=' $up_san' WHERE roll_no= $Up_Roll ";
    $upQuery = mysqli_query($conn, $up_data);
    if($upQuery == true)
    {
        ?>
            <script>
                alert("Upadate Successfully");
            </script>

        <?php
    }
    else{
        ?>
            <script>
                alert("Upadate Error!");
            </script>

        <?php
    }
}


?>