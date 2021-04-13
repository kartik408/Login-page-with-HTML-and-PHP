<?php
  include("connection.php");
 ?>

<html>
  <head>
    <title>Forget Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="forget.CSS">
  </head>
  <body>
    <div class="row justify-content-center">
      <h2 align="center"> Enter your details to get the email or password</h2>
      <div class="col-md-4">
        <form action="" method="POST">
          <input type="text" class="form-control" placeholder="Enter email or phone number" name="email" id="email"/>
          <button class="btn btn-success text-center" name="submit">Submit</button>
        </form>
      </div>
    </div>
<?php
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }
  if (isset($_POST['submit'])) {

  $query = "SELECT * FROM REGISTER WHERE email = '$email' OR phone = '$email'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);

  if($total != 0)
  {
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <table class="table table-hover">
      <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Picture</th>
        <th>Password</th>
        <th>Operations</th>
      </tr>
<?php

    while ($result = mysqli_fetch_assoc($data)) {
      echo "<tr>
        <td>".$result['id']."</td>
        <td>".$result['firstname']."</td>
        <td>".$result['lastname']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['phone']."</td>
        <td>".$result['email']."</td>
        <td><a href='$result[imgsrc]'> <img src='".$result['imgsrc']."' height='100' width='100' /></a></td>
        <td>".$result['password']."</td>
        <td><a href='edit.php?id=$result[id]&firstname=$result[firstname]&lastname=$result[lastname]&gen=$result[gender]&phone=$result[phone]&email=$result[email]&image=$result[imgsrc]&pass=$result[password]'>Edit</a><br><br>
        <a href='delete.php?id=$result[id]' onclick='return getconfirm()'>Delete</a></td>
      </tr>";
    }
}
else {
  echo "no record found";
}
}
?>
</table>

  <script>
    function getconfirm()
    {
      return confirm('Are you sure you want to delete this data ?')
    }
  </script>
  </body>
</html>
