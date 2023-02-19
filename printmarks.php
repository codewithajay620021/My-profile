<?php
  include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrintMarksheet</title>
    <link rel="icon" type="image/x-icon" href="log-img/mbit-logo2.png">
    <link rel="stylesheet" href="pmarks.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
  
    <form action="" method="post"> 
    <div class="container">
        <label for="rollno">Please Enter Roll No.:</label>
        <div>
            <input type="text" name="rollno" id="rollNumber" class="search" >
            <input type="submit" name="search" value="Search" class="btn">
            <button class="btn"><a href="user.html" class="anc">HOME</a></button>
        </div>
    </div> 
    <br>
    </form>
    <div class="table" style="overflow-x: auto;">
    <table style="width:100%">
     
    <?php
      if(isset($_POST['search']))
      {
        
        $serachRoll = $_POST['rollno'];
         
        $sdata = "SELECT * FROM `student_reg` WHERE Roll_No = $serachRoll";
        $stdata = mysqli_query($conn, $sdata);
        $result = mysqli_fetch_array($stdata);


        $data="SELECT * FROM `marks` WHERE roll_no = $serachRoll";
        $allData= mysqli_query($conn,$data);
        $res = mysqli_fetch_array($allData);
        if($res==false)
        {
          ?>
          <script>
            alert("This Roll Number Not Found");
          </script>
          <?php
        }else {
      ?>
        <tr  class="head">
          <th width="30%"><img src="image/logo.jpg" alt="" width="20%"></th>
          <th colspan="3">BIHAR SECONDRY EDUCATION BOARD, PATNA <br> ANNUAL SECONDRY SCHOOL EXAMINATION RESULT- 2022</th>
        </tr>
          <tr class="head3">
            <th colspan="2">PERSONAL DETAILS</th>
          </tr>
      </table>
      <br>
      <table style="width:100%">
          <tr>
           <td><i class="bi bi-three-dots-vertical" class="icon"></i>Roll Number</td>
            <td><?php echo $serachRoll;?></td>
            <td rowspan="5">
              <img src="<?php echo $result['Image'];?>" width="90px" height="100px">
            </td>
          </tr>
          <tr>
            <td><i class="bi bi-person-circle" class="icon"></i>Student Name</td>
            <td><?php echo $result['Name'];?></td>
          </tr>
            <tr>
              <td><i class="bi bi-people-fill" class="icon"></i>Father's Name</td>
              <td><?php echo $result['Fname']; ?></td>
            </tr>
            <tr>
              <td><i class="bi bi-people-fill" class="icon"></i>Mother's Name</td>
              <td><?php echo $result['Mname']; ?></td>
            </tr>
            
      </table>
      <br>
      <table  style="width:100%">
        <tr class="head3">
          <th colspan="7">MARK DETAILS</th>
        </tr>
        <tr>
            <th colspan="">SUBJECTS</th>
            <th colspan="">F. MARKS</th>
            <th colspan="">P. MARKS</th>
            <th colspan="">THEORY</th>
            <th colspan="">INT/PRAC</th>
            <th colspan="">REGULATION</th>
            <th colspan="">SUBJECT TOTAL</th>
            
        </tr>
        <tr>
            <td>HINDI</td>
            <td>100</td>
            <td>30</td>
            <td id="hindi"><?php echo $res['Hindi']; ?> </td>
            <td> </td>
            <td> </td>
            <td> <?php echo $res['Hindi']; ?></td>
            
          </tr>
          <tr>
            <td>ENGLISH</td>
            <td>100</td>
            <td>30</td>
            <td id="english"><?php echo $res['English']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['English']; ?></td>
            
          </tr>
          <tr>
            <td>MATHEMATICS</td>
            <td>100</td>
            <td>30</td>
            <td id="math"><?php echo $res['Math']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['Math']; ?></td>
            
          </tr>
          <tr>
            <td>SCIENCE</td>
            <td>100</td>
            <td>30</td>
            <td id="science"><?php echo $res['Science']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['Science']; ?></td>
            
          </tr>
          <tr>
            <td>SOCIAL SCIENCE</td>
            <td>100</td>
            <td>30</td>
            <td id="sscience"><?php echo $res['Sscience']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['Sscience']; ?></td>
            
          </tr>
          <tr>
            <td>SANSKRIT</td>
            <td>100</td>
            <td>30</td>
            <td id="sanskrit"><?php echo $res['Sanskrit']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['Sanskrit']; ?></td>
            
          </tr>
          
      </table>
      <br>
      <table style="width:100%">
        <tr class="head3">
            <th colspan="4">FINAL RESULTS</th>
          </tr>
          <tr>
          <th colspan="">RESULT</th>
            <th colspan="">DIVISION</th>
            <th colspan="">PERCENTAGE</th>
            <th colspan="">TOTAL MARKS</th>
        </tr>
        <tr>
            <td id="result"></td>
            <td id="division"></td>
            <td id="percent"></td>
            <td id="total"></td>
           
            
          </tr>
          </table><br>
          
      <h3>Abbreviation Used</h3>
      <p> <span>Percenage >= 60 : 1st Divison, Percentage<60&>=45, 2nd Division, Percebtage<45&>=33, 3rd Divison, Result: Percentage>=33, Passed, Percentage = 33, Failed </span></p>
    </div>
    <?php
      }
          }
          ?>
          <script>
          let hindi = parseInt(document.getElementById('hindi').innerHTML);
          let english = parseInt(document.getElementById('english').innerHTML);
          let math = parseInt(document.getElementById('math').innerHTML);
          let science = parseInt(document.getElementById('science').innerHTML);
          let sscience = parseInt(document.getElementById('science').innerHTML);
          let sanskrit = parseInt(document.getElementById('sanskrit').innerHTML);
          let total = hindi+english+math+science+sscience+sanskrit;
          
         document.getElementById('total').innerHTML = total;
         let percent = parseFloat(total/6);
         percent = Math.round(percent);
         document.getElementById('percent').innerHTML= percent+"%";
         if(percent>=60){
          document.getElementById('division').innerHTML= "First";
         }else if (percent>=45){
          document.getElementById('division').innerHTML= "Second";
         }else if (percent>=33){
          document.getElementById('division').innerHTML= "Third";
         }else {
          document.getElementById('division').innerHTML= "Poor";
         }
         if(percent>=33){
          document.getElementById('result').innerHTML= "<span style='color:green'>Passed</span>";
         }else {
          document.getElementById('result').innerHTML= "<span style='color:red'>Failed</span>";
         }

        </script>
        <?php
        
        ?>
        <script src="index.js"></script>
</body>
</html>