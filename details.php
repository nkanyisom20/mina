<?php
  session_start();
  $student_no = $_SESSION['student_no'];
?>
<?php
  include 'include_lf/connect.php';
  include 'include_lf/details.php';
?>
<?php
if(isset($_POST['submit'])) {
  $fullnames = ucwords(htmlspecialchars($_POST['fullnames']));
  $surname = ucfirst(htmlspecialchars($_POST['surname']));
  $gender = htmlspecialchars($_POST['gender']);
  $identity_no = htmlspecialchars($_POST['identity_no']);
  $email_addr = strtolower(htmlspecialchars($_POST['email_addr']));
  $contact_no = htmlspecialchars($_POST['contact_no']);
  $biography = htmlspecialchars($_POST['biography']);

  $sql = "UPDATE student_reg SET fullnames = '$fullnames', surname = '$surname', gender = '$gender' WHERE student_no = $student_no;";
  $connect->query($sql);

  $result = mysqli_query($connect,"SELECT * from student_reg WHERE student_no = $student_no;");
  if($row = mysqli_fetch_array($result)){
    $stu_reg_id = $row['stu_reg_id'];
    }
  $sql = "UPDATE student_inf SET identity_no = '$identity_no', email_addr = '$email_addr', contact_no = '$contact_no', biography = '$biography'
  WHERE stu_reg_id = $stu_reg_id";
  $connect->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <body>
    <?php
      include 'links_int.php';
    ?>
    <h3>Update your Details</h3>
    <form class="" action="" method="post">
      <label for="fullnames">Fullnames</label>
      <input type="text" name="fullnames" value="<?php echo $fullnames; ?>">
      <br>
      <label for="surname">Surname</label>
      <input type="text" name="surname" value="<?php echo $surname; ?>">
      <br>
      <fieldset>
        <legend>Gender</legend>
        <label for="female">Female</label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female" ) echo "checked";?> value="Female">
        <label for="male">Male</label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male" ) echo "checked";?> value="Male">
      </fieldset>
      <label for="identity_no">Identity No.</label>
      <input type="text" name="identity_no" id="identity" maxlength="16"  value="<?php echo $identity_no; ?>">
      <br>
      <label for="email_addr">Email Address</label>
      <input type="email" name="email_addr" value="<?php echo $email_addr; ?>">
      <br>
      <label for="contact_no">Contact No.</label>
      <input type="text" name="contact_no" id="contact" maxlength="12" value="<?php echo $contact_no; ?>">
      <br>
      <label for="biography">Biography</label>
      <br>
      <textarea name="biography" rows="10" cols="35" placeholder="I am Nkanyiso a Software Developer...."><?php echo $biography; ?></textarea>
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
<script>
    var contact = document.querySelector('#contact');

    contact.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (contact.value.length === 3 || contact.value.length === 7)){
      contact.value += ' ';
      }
    });

    var identity = document.querySelector('#identity');

    identity.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (identity.value.length === 6 || identity.value.length === 11 || identity.value.length ===14)){
      identity.value += ' ';
      }
    });
</script>
