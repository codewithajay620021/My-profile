<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="abc.css">
</head>
<body>
    <h1>Information List</h1>
    <table>
        <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Last</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Mobile</th>
            <th>State</th>
            <th>Pass</th>
            <th>Cpass</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tbody>
            <?php 
            include 'conn.php';
            $sql="SELECT * FROM `record`";
            $result=mysqli_query($conn,$sql);
            if($result){
                while($roow=mysqli_fetch_assoc($result))
                {
                $Sn=$roow['Sn'];
                $uname=$roow['Name'];
                $uname2=$roow['Last'];
                $mail=$roow['Email'];
                $gender=$roow['Gender'];
                $phone=$roow['Mobile'];
                $select=$roow['State'];
                $pass=$roow['Pass'];
                $cpassword=$roow['Cpass'];
            

                echo '<tr>
                <th> '.$Sn.' </th>
                <td> '.$uname.' </td>
                <td> '.$uname2.' </td>
                <td> '.$mail.' </td>
                <td> '.$gender.' </td>
                <td> '.$phone.' </td>
                <td> '.$select.' </td>
                <td> '.$pass.' </td>
                <td> '.$cpassword.' </td>
                <td><button><a href="update.php?updateid='.$Sn.'">Update</a></button> </td>
                <td><button> <a href="delete.php?deleteid='.$Sn.'">Delete</a> </button> </td>
                


                </tr>';
                }

            }
            
            ?>

        </tbody>
    </table>
            <button class="ab"><a href="index.php">Go To Home Page</a></button>
</body>
</html>