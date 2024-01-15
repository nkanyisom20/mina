<?php
  include 'include_lf/connect.php';
?>
<?php
if(isset($_POST['submit'])) {
$student_no = htmlspecialchars($_POST['student_no']);
$fullnames = htmlspecialchars($_POST['fullnames']);
$surname = htmlspecialchars($_POST['surname']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
$gender = $_POST['gender'];

//Checking if the Student No is not already existing in the system.
$result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
if($row = mysqli_fetch_array($result) == true){
  echo "The Student Number already exists to the system";
  }
else
  {

  $sql = "INSERT INTO student_reg(student_no, fullnames, surname, password, date_of_birth, gender)
                          VALUES ('$student_no', '$fullnames', '$surname', '$password', '$date_of_birth', '$gender')";
  $connect->query($sql);

  $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
  if($row = mysqli_fetch_array($result)){
    $stu_reg_id = $row['stu_reg_id'];
    $stu_reg_id = $stu_reg_id;
    $sql = "INSERT INTO student_inf(stu_reg_id) VALUES ('$stu_reg_id')";
    $connect->query($sql);
  }
    echo "<br>";
    echo "You have successfully registered";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Registation</title>
  </head>

  <body>
    <?php
      include 'links_ext.php';
    ?>
    <form class="" action="" method="post">
      <label for="student_no">Student No.</label>
      <input type="text" name="student_no" value="">
      <br>
      <label for="fullnames">Fullnames</label>
      <input type="text" name="fullnames" value="">
      <br>
      <label for="surname">Surname</label>
      <input type="text" name="surname" value="">
      <br>
      <label for="password">Password</label>
      <input type="password" name="password" value="">
      <br>
      <label for="gender">Gender</label>
      <select id="gender" name="gender">
          <option value="None" selected>None</option>
          <option value="Female">Female</option>
          <option value="Male">Male</option>
      </select>
      <label for="date_of_birth">Date of Birth</label>
      <input type="date" name="date_of_birth" value="">
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
  <footer>
    <?php
      include 'include_lf/footer.php';
     ?>
  </footer>
</html>
