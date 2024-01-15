<?php
  session_start();
?>
<?php
  include 'include_lf/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Services</title>
  </head>
  <body>
    <?php
      include 'links_int.php';
     ?>
    <h3>Documents that can be reported</h3>
    <img src="img/pic_id.jpeg" alt="Identity Document" height="100" width="200">
    <p>Identity Document</p>
    <img src="img/pic_dl.jpeg" alt="Drivers License" height="100" width="200">
    <p>Drivers License</p>
    <img src="img/pic_sc.jpeg" alt="Student Card" height="100" width="200">
    <p>Student Card</p>
    <img src="img/pic_q.jpeg" alt="Qualification" height="300" width="200">
    <p>Qualification</p>
    <br>
  </body>
  <footer>
    <?php
      include 'include_lf/footer.php';
     ?>
  </footer>
</html>
