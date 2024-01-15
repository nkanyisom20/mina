<?php
  session_start();
  $student_no = $_SESSION['student_no'];
?>
<?php
  include 'include_lf/connect.php';
?>
<?php
if(isset($_POST['submit'])) {
$student_no = htmlspecialchars($_POST['student_no']);
$type_of_doc = htmlspecialchars($_POST['type_of_doc']);
$location = htmlspecialchars($_POST['location']);

$result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
if($row = mysqli_fetch_array($result)){
  $fullnames = $row['fullnames'];
  $surname = $row['surname'];
}

$sql = "INSERT INTO lost_found(student_no, fullnames, surname, type_of_doc, location)
                      VALUES ('$student_no', '$fullnames', '$surname', '$type_of_doc', '$location')";

$connect->query($sql);

echo "Successfully Reported";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Report L&F</title>
  </head>

  <body>
    <?php
      include 'links_int.php';
    ?>
    <h3>Report the Lost & Found documents</h3>
    <p>Everything is important to us</p>
    <p>Take few munites to return it to owner</p>
    <p>Follow this few ticks </p>
    <form class="" action="" method="post">
      <label for="student_no">Student No.</label>
      <input type="text" name="student_no" value="">
      <br>
      <label for="contact_no">Contact No.</label>
      <select id="type_of_doc" name="type_of_doc">
        <option value="Identity Document">Identity Document</option>
        <option value="Student Card">Student Card</option>
        <option value="Drivers Licence">Drivers Licence</option>
        <option value="Matric Certificate">Matric Certificate</option>
        <option value="High Certificate">High Certificate</option>
      </select>
      <label for="location">Venue</label>
      <select id="location" name="location">
        <option value="Admin Building">Admin Building</option>
        <option value="Main Gate">Main Gate</option>
        <option value="Student Centre">Student Centre</option>
        <option value="Library">Library</option>
      </select>
      <br>
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>
    <br>
  </body>
  <footer>
    <?php
      include 'include_lf/footer.php';
     ?>
  </footer>
</html>
