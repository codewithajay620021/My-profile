<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marks</title>
  <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
  <link rel="stylesheet" href="marksfill.css">

</head>

<body>
  <button><a href="admin.html">Home</a></button>

  <h3>Enter Marks of Subject</h3>

  <div>
    <form action="" method="POST">
      <label for="rollno">RollNo.</label>
      <select id="rollno" name="roll">
        <?php
        include 'conn.php';
        $query = "SELECT * FROM `student_reg`";
        $queryrun = mysqli_query($conn, $query);
        $res = mysqli_num_rows($queryrun);
        if ($res > 0) {
          foreach ($queryrun as $row) {
            ?>
            <option value="<?= $row['Roll_No'] ?>">
              <?= $row['Roll_No'] ?>
            </option>


            <?php


          }
          ?>

          <input type="submit" value="Search" name="search">
          <?php
          if (isset($_POST['search'])) {
            $iroll = $_POST['roll'];
            $sdata = "SELECT * FROM `student_reg` WHERE Roll_no = $iroll";
            $iquery = mysqli_query($conn, $sdata);
            $iresult = mysqli_fetch_array($iquery);


            ?>
            <label for="roll"> RollNo.:</label>
            <input type="text" name="iroll" placeholder="" value="<?php echo $iroll; ?>">
            <label for="sname"> Student's Name:</label>
            <input type="text" id="" name="sname" placeholder="" value="<?php echo $iresult['Name']; ?>" readonly>
            <label for="fname">Father's Name:</label>
            <input type="text" id="" name="fname" placeholder="" value="<?php echo $iresult['Fname']; ?>">
            <label for="mname"> Mother's Name:</label>
            <input type="text" id="" name="mname" placeholder="" value="<?php echo $iresult['Mname']; ?>">
            <label for="dob"> Date Of Birth:</label>
            <input type="text" id="" name="dob" placeholder="" value="<?php echo $iresult['DOB']; ?>">
            <label for="dob"> Student Image:</label>
            <input type="text" id="" name="image" placeholder="" value="<?php echo $iresult['Image']; ?>">
            <br>
            <?php
            ?>
            <script>
              alert("Student Data has been Fill Successfully");
            </script>
            <?php
          }
          ?>




          <?php
        }
        ?>
      </select>


      <label for="hindi"> Hindi Mark:</label>
      <input type="text" id="hindi" name="hindi" placeholder="">
      <label for="English"> English Mark:</label>
      <input type="text" id="english" name="english" placeholder="">
      <label for="Math"> Math Mark:</label>
      <input type="text" id="math" name="math" placeholder="">
      <label for="science"> Science Mark:</label>
      <input type="text" id="science" name="science" placeholder="">
      <label for="sscience">Socical Sciience Mark:</label>
      <input type="text" id="sscience" name="sscience" placeholder="">
      <label for="sanskrit"> Sanskrit Mark:</label>
      <input type="text" id="sanskrit" name="sanskrit" placeholder="">
      <input type="submit" value="Submit" name="save">
    </form>
    <?php

    if (isset($_POST['save'])) {
      $sroll = $_POST['iroll'];
      $sname = $_POST['sname'];
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $dob = $_POST['dob'];
      $img = $_POST['image'];
      $hindi = $_POST['hindi'];
      $english = $_POST['english'];
      $math = $_POST['math'];
      $science = $_POST['science'];
      $sScience = $_POST['sscience'];
      $sanskrit = $_POST['sanskrit'];
      if ($hindi > 100 || $english > 100 || $math > 100 || $science > 100 || $sScience > 100 || $sanskrit > 100) {
        ?>
        <script>
          alert("Mark is Grater than 100");
        </script>
        <?php
      } else {
        $markData = "SELECT * FROM `marks` WHERE roll_no = $sroll";
        $q = mysqli_query($conn, $markData);
        $res = mysqli_fetch_array($q);
        if ($res > 0) {
          echo "This Roll No. Related Marks has been Save Please Try Other Roll No.";

        } else {
          $insertData = "INSERT INTO `marks`(`roll_no`, `Sname`, `Fname`, `Mname`,`DOB`,`Image`,`Hindi`, `English`, `Math`, `Science`, `Sscience`, `Sanskrit`) VALUES ('$sroll','$sname','$fname','$mname','$dob', '$img','$hindi','$english','$math','$science','$sScience','$sanskrit')";
          $result = mysqli_query($conn, $insertData);
          if ($result == true) {
            ?>
            <script>
              alert("Marks has been Saved");
            </script>
            <?php
          } else {
            ?>
            <script>
              alert("Marks Error!");
            </script>
            <?php
          }
        }

      }

    }

    ?>
  </div>

</body>

</html>