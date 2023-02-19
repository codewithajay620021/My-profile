
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" placeholder="Enter username" name="uname"><br>
    <input type="password" placeholder="Enter your password" name="pass"><br>
    <button value="submit">Submit</button>

  </form>
</body>
</html>
  <?php
  include 'conn.php';
  if (isset($_POST['submit']))
  { 
  $username = $_POST['uname'];
  $password = $_POST['pass'];

  $value = "SELECT * FROM `record`";
  $rdata = mysqli_query($conn,$value);
  $result = mysqli_fetch_array($rdata);

      $duname = $result['Email'];
      $dpass = $result['Cpass'];


  if($username == $duname && $password == $result)
  {
      header('location:admin.html');
  }
  else{
    echo "Error!";
  }

}

?>
 