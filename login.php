<?php
  include("connection.php");
?>

<html>
    <head>
        <title>LOGIN PAGE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="login1.CSS">
    </head>
    <body>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1>Kartik's Login</h1>
                <p>Login to go onto the new page</p>
            </div>
            <div class="col-md-4">
                <form action="" method="POST">
                    <input type="text" class="form-control" placeholder="Email" name="email" id="email"/>
                    <input type="text" class="form-control" placeholder="Password" name="pass" id="password"/>
                    <button class="btn btn-primary text-center" name="submit">Login</button><br>
                    <a href="forget.php" class="text-center">Forgot account ?</a>
                    <hr>
                    <button class="btn btn-success text-center"><a class="create" href="reg1.php"> Create a new account</a> </button>
                </form>
                <a href="#" class="a"><b>Create a page </b></a>for your profile or business
            </div>
        </div>

<?php

  if (isset($_POST['pass'])) {
  $password = $_POST['pass'];
  }
  if (isset($_POST['email'])) {
  $email = $_POST['email'];
  }
  if (isset($_POST['submit'])){
  $sql = "SELECT * FROM REGISTER WHERE email='".$email."' AND password='".$password."' limit 1";
  $result = mysqli_query($conn, $sql);

  if (!$result || mysqli_num_rows($result)==1) {
    header("Location:frame.php");
    exit();
  }
  else {
    echo "<script> alert('Wrong username and password ')</script>";
  }
}
 ?>
    </body>
</html>
