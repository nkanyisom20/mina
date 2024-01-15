<?php
  session_start();
  $student_no = $_SESSION['student_no'];
?>
<?php
include 'include_lf/connect.php';
?>
<?php
  if(isset($_POST['submit'])) {
    $salute = $_POST['salute'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (salute, comment)VALUES ('$salute', '$comment')";
    $connect->query($sql);

    echo "<br>";
    echo "Comment successfully send";
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Speak to Us</title>
  </head>
  <body>
    <?php
      include 'links_int.php';
     ?>
     <h3>Contact Us</h3>
     <p>Please feel free to contact us</p>
     <p>Phone: 071 840 7522</p>
     <p>Email: admin@lost_found.com</p>
     <form class="" action="#" method="post">
       <label for="salutation">Salutation:</label>
       <input type="text" name="salute" value="" required>
       <br>
       <textarea name="comment" rows="8" cols="50" placeholder="Hi can I speak to...."></textarea>
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
