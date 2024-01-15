<?php
  session_start();
  $student_no = $_SESSION['student_no'];
?>
<?php
  include 'include_lf/connect.php';
  include 'include_lf/pagination.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View_L&F</title>
  </head>
  <body>
    <?php
      include 'links_int.php';
     ?>
    <h3>Here are recent found documents </h3>
    <?php
      /*
      $count = mysqli_query($connect, "SELECT COUNT(`collected`) FROM `lost_found` WHERE`collected`= 1;");
          while($docs = mysqli_fetch_array($count)){
          $collected= strtotime($docs['collected']);
          echo "No. of documents collected is ".$docs."<br>";
        }
      */
     ?>
    <p></p>
      <?php
      if (mysqli_num_rows($nquery) > 0) {
        while($crow = mysqli_fetch_array($nquery))
          {
              $student_no = $crow['student_no'];
              $surname = $crow['surname'];
              $fullnames= $crow['fullnames'];
              $type_of_doc = $crow['type_of_doc'];
              $location= $crow['location'];
              $date= $crow['date'];

              echo "Hi ".$surname." ".$fullnames." ".'('.$student_no.')';
              echo "<br>";
              echo "We have found your ".$type_of_doc." on the ".$date;
              echo "<br>";
              echo "please come and collect it at ".$location.".";
              echo "<br>";
              echo "We thank you.";
              echo "<br>";
              echo "Regards (Student Affairs).";
              echo "<br>";
              echo "<br>";
              echo "**********************************************************";
              echo "<br>";echo "<br>";
            }
          }
        else
        {
          echo "Nothing have been reported for now";
        }
      ?>
      <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
      <br>
  </body>
  <footer>
    <?php
      include 'include_lf/footer.php';
     ?>
  </footer>
</html>
