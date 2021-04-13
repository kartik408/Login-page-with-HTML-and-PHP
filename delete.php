<?php
  include("connection.php");
  $id = $_GET['id'];

  $query = "DELETE FROM register WHERE id='$id'";
  $data = mysqli_query($conn, $query);

  if ($data) {
    echo "<script> alert('Record deleted')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0 URL=http://localhost/tuts/loginformbootstrap/login.php">
      <?php
  } else {
    echo "Not deleted";
  }

?>
