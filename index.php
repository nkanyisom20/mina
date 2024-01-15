<?php
include 'include_lf/connect.php';
$success=false;

$student_no = $_POST['student_no'];
$password = $_POST['password'];
//Checking if the Student No. is existing in the system.
  $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
  if($row = mysqli_fetch_array($result) == false){
    echo "The Student Number do not exists to the system";
    }
  else
    {
      //Checking if the Student No. is verified in the system.
      $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no AND verified = 0;");
      if($row = mysqli_fetch_array($result) == true){
        echo "The Student Number exists to the system but not verified";
        }
      else
        {
          //Checking if the Student No. is removed or not in the system.
          $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no AND removed = 1;");
          if($row = mysqli_fetch_array($result) == true){
            echo "The Student Number have been removed from the system";
            }
          else
            {

            $result = mysqli_query($connect, "SELECT * FROM student_reg WHERE student_no = '$student_no' AND verified = 1 AND removed = 0;");
            while($row = mysqli_fetch_array($result))
            {
            	if(password_verify($password, $row['password'])){
            		$success = true;
              		$student_no = $row['student_no'];
              		$surname = $row['surname'];
              		$fullnames= $row['fullnames'];
            	}
            }
                if($success == true)
                {	
                	session_start();
                    $_SESSION['student_no'] = $student_no;
                    $_SESSION['surname'] = $surname;
                    $_SESSION['fullnames'] = $fullnames;
    
                    $student_no = $_SESSION['student_no'];
                    $surname = $_SESSION['surname'];
                    $fullnames = $_SESSION['fullnames'];
    
                  	header("location: home.php");
                }
                else
                {
              echo "Username/Password is incorrect";
          	    }
            }
            
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Log In</title>
  </head>

  <body>
    <?php
      include 'links_ext.php';
    ?>
    <form class="" action="" method="post">
      <label for="student_no">Student No.</label>
      <input type="text" name="student_no" value="">
      <br>
      <label for="password">Password</label>
      <input type="password" name="password" value="">
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>