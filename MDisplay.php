<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="MDisplay.css">
</head>
<body>
    
<h2>Information List</h2>
<div class="container">
    <table>
        <tr>
            <th>Sn_No.</th>
            <th>Roll_No</th>
            <th>Student Name</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Date of Birth</th>
            <th>Hindi</th>
            <th>English</th>
            <th>Math</th>
            <th>Science</th>
            <th>Sscience</th>
            <th>Sanskrit</th>
            <th>Print</th>

        </tr>
        <tbody>
            <?php 
            include 'conn.php';
            $sql="SELECT * FROM `marks`";
            $saveQuery=mysqli_query($conn,$sql);
            while($result=mysqli_fetch_array($saveQuery))
            {
                ?>
                    <tr>
                        <td><?php echo $result['Sn'];?></td>
                        <td><?php echo $result['roll_no'];?></td>
                        <td><?php echo $result['Sname'];?></td>
                        <td><?php echo $result['Fname'];?></td>
                        <td><?php echo $result['Mname'];?></td>
                        <td><?php echo $result['DOB'];?></td>
                        <td><?php echo $result['Hindi'];?></td>
                        <td><?php echo $result['English'];?></td>
                        <td><?php echo $result['Math'];?></td>
                        <td><?php echo $result['Science'];?></td>
                        <td><?php echo $result['Sscience'];?></td>
                        <td><?php echo $result['Sanskrit'];?></td>
                        <td><button class="ab"><a href="printmarks.php">PrintMarksheet</a></button></td>
                    </tr>
                <?php
            }  
        ?>
        </tbody>
    </table>
    <button class="ab"><a href="menu.php">Go To Home Page</a></button>
    </div>
</body>
</html>