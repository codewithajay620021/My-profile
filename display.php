<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="display.css">
</head>

<body>
    <button class="ab"><a href="menu.php">Go To Home Page</a></button>
    <h2>Information List</h2>
    <div class="container">
        <table>
            <tr>
                <th>Roll_No</th>
                <th>Reg_No</th>
                <th>Student Name</th>
                <th>Father's Name</th>
                <th>Mother's Name</th>
                <th>Date Of Birth</th>
                <th>Current Date</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tbody>
                <?php
                include 'conn.php';
                $sql = "SELECT * FROM `student_reg`";
                $saveQuery = mysqli_query($conn, $sql);
                while ($result = mysqli_fetch_array($saveQuery)) {
                    ?>
                    <tr>
                        <td><?php echo $result['Roll_No']; ?></td>
                        <td>
                            <?php echo $result['Reg_No']; ?>
                        </td>
                        <td><?php echo $result['Name']; ?></td>
                        <td>
                            <?php echo $result['Fname']; ?>
                        </td>
                        <td><?php echo $result['Mname']; ?></td>
                        <td>
                            <?php echo $result['DOB']; ?>
                        </td>
                        <td><?php echo $result['Date']; ?></td>
                        <td>
                            <img src="<?php echo $result['Image']; ?>" width="60px" height="55px">
                        </td>

                        <td>
                            <button><a href="updateReg.php">Update</a></button>
                        </td>

                        <td>
                            <button><a href="delete.php?Roll=<?php echo $result['Roll_No'];?>">Delete</a></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>