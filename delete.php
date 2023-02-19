 <?php
 include 'conn.php';

 $Roll = $_GET['Roll'];
 $data = "DELETE FROM `student_reg` WHERE Roll_No = '$Roll'";
 $result = mysqli_query($conn, $data);
 if($data)
 {
    echo "Record Is Deleted";
 }else{
    echo "Field To Delete";
 }
?>