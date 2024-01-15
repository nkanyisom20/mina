<?php
  session_start();
  $student_no = $_SESSION['student_no'];
?>
<?php
include 'include_lf/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <?php
      include 'links_int.php';
     ?>
    <h3>
      <?php echo "Hello ".$student_no;?>
    </h3>
      <?php

        $result = mysqli_query($connect, "SELECT * FROM student_reg WHERE student_no = $student_no;");
        while($row = mysqli_fetch_array($result))
          {
        		$student_no = $row['student_no'];
        		$surname = $row['surname'];
        		$fullnames= $row['fullnames'];
        	}
          echo "Welcome Back ".$surname." ".$fullnames." ".'('.$student_no.')';
      ?>
      <br>
      <br>
  </body>
  <footer>
    <?php
      include 'include_lf/footer.php';
     ?>
  </footer>
</html>
