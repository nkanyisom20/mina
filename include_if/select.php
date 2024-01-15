<?php
  $student_no = $_SESSION['student_no'];
  $sql = mysqli_query($connect, "SELECT * FROM student_reg where student_no = $student_no;");
  while($row_reg = mysqli_fetch_array($sql)){
    $stu_reg_id = $row_reg['stu_reg_id'];
    $fullnames = $row_reg['fullnames'];
    $surname = $row_reg['surname'];
    $gender = $row_reg['gender'];
    }
  $sql = mysqli_query($connect, "SELECT * FROM student_inf where stu_reg_id = $stu_reg_id;");
  while($row_inf = mysqli_fetch_array($sql)){
    $identity_no = $row_inf['identity_no'];
    $email_addr = $row_inf['email_addr'];
    $contact_no = $row_inf['contact_no'];
    $biography = $row_inf['biography'];
}
?>
