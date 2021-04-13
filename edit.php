<?php
  include ("connection.php");
  error_reporting(0);
  $_GET['id'];
  $_GET['firstname'];
  $_GET['lastname'];
  $_GET['phone'];
  $_GET['email'];
  $_GET['pass'];
?>
<!-- same form of registration -->
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
<form action="" method="GET" enctype="multipart/form-data">
  <div class="container">
<center> <h1 style="margin-top:-30px;">Update the account</h1> </center>
  <hr>
<label> Firstname </label>
<input type="text" name="firstname" placeholder= "Firstname"  value="<?php echo $_GET['firstname'];?>" required />
<label> Lastname: </label>
<input type="text" name="lastname" placeholder="Lastname" value="<?php echo $_GET['lastname']; ?>" required />
<label> Id </label>
<input type="text" name="id" placeholder= "id"  value="<?php echo $_GET['id'];?>" required />
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
</div>
<div>
<label>
Gender :
</label><br>
<div style="margin-left:60px;">
<input type="radio" value="Male" name="gender" checked required> Male
<input type="radio" value="Female" name="gender" required> Female
<input type="radio" value="Other" name="gender" required> Other
</div>
</div> -->
<label>
Phone :
</label>
<input type="text" name="country code" placeholder="Country Code"  value="+91" size="2"/>
<input type="text" name="phone" placeholder="phone no." value="<?php echo $_GET['phone']; ?>" size="10"/ required >
<label>Current Address :</label>
<textarea cols="80" rows="5" placeholder="Current Address" value="address" required>
</textarea>
 <label for="email"><b>Email</b></label>
 <input type="text" placeholder="Enter Email" name="email" value="<?php echo $_GET['email']; ?>" required>

 <!--<label for="image"><b>Upload Picture :</b></label>
 <input type="file" name="uploadfile" value=""><br><br>-->

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" value="<?php echo $_GET['pass']; ?>" required>

    <label for="psw-repeat"><b>Re-type Password</b></label>
    <input type="password" placeholder="Retype Password" name="psw-repeat" value="<?php echo $_GET['pass']; ?>" required>
    <button type="submit" class="registerbtn" name="submit" value="Submit">Update</button>
</form>

<!-- saving the data in the databse -->
<?php
 if($_GET['submit'])
 {
   $id = $_GET['id'];
   $first = $_GET['firstname'];
   $last = $_GET['lastname'];
   $gen = $_GET['gen'];
   $phone = $_GET['phone'];
   $email = $_GET['email'];
   $pass = $_GET['psw'];

   $query = "UPDATE register SET firstname='$first', lastname='$last', phone='$phone', email='$email', password='$pass' WHERE id='$id' ";
   $data = mysqli_query($conn, $query);

   if ($data) {
     echo "record updated....";
   }
   else {
     echo "record not updated";
   }

 }
 else {
   echo "Click on update button to save the changes";
 }
 ?>

</body>
</html>
