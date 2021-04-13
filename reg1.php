<?php
  include ("connection.php");
  error_reporting(0);
?>

<html>
<head>
<style>
body{
  font-family: Calibri, Helvetica, sans-serif;
  background-color: pink;
}
.container {
    padding: 50px;
  background-color: lightblue;
}
label{
  font-weight: bold;
}
input[type=text], input[type=password], textarea {
  width: 100%;
  padding: 15px;
  margin: 10px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: orange;
  outline: none;
}
 div {
      padding: 10px 0;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.registerbtn:hover {
  opacity: 1;
}
</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
  <div class="container">
<center> <h1 style="margin-top:-30px;">Create a new account</h1> </center>
  <hr>
<label> Firstname </label>
<input type="text" name="firstname" placeholder= "Firstname"  value="" required />
<label> Middlename: </label>
<input type="text" name="middlename" placeholder="Middlename" required />
<label> Lastname: </label>
<input type="text" name="lastname" placeholder="Lastname" value="" required />
<label> ID: </label>
<input type="text" name="id" placeholder="Id" value="" required />
<!--<div>
<label>
Course :
</label>
<select>
<option value="Course">Course</option>
<option value="BCA">BCA</option>
<option value="BBA">BBA</option>
<option value="B.Tech">B.Tech</option>
<option value="MBA">MBA</option>
<option value="MCA">MCA</option>
<option value="M.Tech">M.Tech</option>
</select>
</div> -->
<div>
<label>
Gender :
</label><br>
<div style="margin-left:60px;">
<input type="radio" value="Male" name="gender" checked required> Male
<input type="radio" value="Female" name="gender" required> Female
<input type="radio" value="Other" name="gender" required> Other
</div>
</div>
<label>
Phone :
</label>
<input type="text" name="country code" placeholder="Country Code"  value="+91" size="2"/>
<input type="text" name="phone" placeholder="phone no." size="10"/ required >
<label>Current Address :</label>
<textarea cols="80" rows="5" placeholder="Current Address" value="address" required>
</textarea>
 <label for="email"><b>Email</b></label>
 <input type="text" placeholder="Enter Email" name="email" value="" required>

 <label for="image"><b>Upload Picture :</b></label>
 <input type="file" name="uploadfile" value="" /><br><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" value="" required>

    <label for="psw-repeat"><b>Re-type Password</b></label>
    <input type="password" placeholder="Retype Password" name="psw-repeat" required>
    <button type="submit" class="registerbtn" name="submit" value="Submit">Submit</button>
</form>

<!-- saving the data in the databse -->
<?php
 if($_POST['submit'])
 {
   $first = $_POST['firstname'];
   $last = $_POST['lastname'];
   $id = $_POST['id'];
   $pass = $_POST['psw'];
   $gen = $_POST['gender'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $filename = $_FILES["uploadfile"]["name"];  //name of the file
   $tempname = $_FILES["uploadfile"]["tmp_name"];  //temporary name given by php
   $folder = "images/".$filename;
   move_uploaded_file($tempname, $folder);

   if($first!="" && $last!="" && $id!="" && $pass!="" && $gen!="" && $email!="" && $phone!="" && $filename!="")
   {
      $query = "INSERT INTO REGISTER VALUES('$id','$first', '$last', '$gen', '$phone', '$email', '$pass', '$folder')";
      $data = mysqli_query($conn, $query);

      if ($data)
      {
        echo "data inserted successfully....";
      }
   }
   else
    {
     echo "All fields are required";
    }
 }
 ?>


</body>
</html>
