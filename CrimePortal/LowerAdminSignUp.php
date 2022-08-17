<?php

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // something was posted
  $Name = $_POST['Name'];
  $CNIC = $_POST['CNIC'];
  $gender = $_POST['gender'];
  $Email = $_POST['Email'];
  $Phone = $_POST['Phone'];
  $Area = $_POST['Area'];
  $Designation = $_POST['Designation'];
  $DeptCode = $_POST['DeptCode'];
  $Senior_Name = $_POST['Senior_Name'];
  $Duty_Shift = $_POST['Duty_Shift'];
  $Joining_Date = $_POST['Joining_Date'];
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  $C_Password = $_POST['C_Password'];
  $filename = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

  if (!is_numeric($Username)) {
    // save to database
    // generate random ID
    $user_id = random_num(7);
    $query = "insert into loweradminrequest_tbl (user_id, Name, CNIC, Gender, Email, Phone, Area,
      Designation, DeptCode, Senior_Name, Duty_Shift, Joining_Date, Username, Password,
      C_Password, Image) values ('$user_id',  '$Name', '$CNIC', '$gender', '$Email', '$Phone', '$Area', '$Designation',
      '$DeptCode', '$Senior_Name', '$Duty_Shift', '$Joining_Date', '$Username', '$Password', '$C_Password', '$filename')";
    if ($Password == $C_Password) {
      mysqli_query($con, $query);
      echo "<script>alert('good')</script>";
    } else {
      echo "<script>Data in password and confirm password field should be same</script>";
    }
  } else {
    echo "<script>Username should be string not integer</script>";
  }
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Lower admin signup</title>
  <link rel="stylesheet" href="LowerAdminSignUp.css">
  <script src="uploadimage.js"></script>
</head>

<body>
  <form action="" method="post" enctype='multipart/form-data'>


    <h2>Here you can create your account to operate this system</h2>
    <div class="maincontentdiv">
      <div class="firstdiv">
        <h3>Personal Information</h3>
        <hr>
        <label for="Name">Name</label>
        <input type="text" name="Name" value="" placeholder="Your Full name" required>
        <br />
        <label for="CNIC">CNIC</label>
        <input type="text" name="CNIC" value="" placeholder="Your CNIC" required>

        <p>Slect you gender</p>
        <input type="radio" id="male" name="gender" value="male" />
        <label for="male">Male</label>

        <input type="radio" id="female" name="gender" value="female" />
        <label for="female">Female</label>

        <input type="radio" id="other" name="gender" value="other" />
        <label for="other">Other</label>
        <br />
        <br />

        <label for="Email">Email</label>
        <input type="email" name="Email" value="" placeholder="eg: example@gmail.com" required>
        <br />

        <label for="Phone">Phone</label>
        <input type="text" name="Phone" value="" placeholder="eg: 0300000000" required>
        <br />

      </div>
      <div class="seconddiv">
        <h3>Department Information</h3>
        <hr>
        <label for="Area">Area</label>
        <select name="Area" style="width: 70%; padding: 10px; margin: 5px 0 20px 0; display: inline-block; border: none; background: white;" id="area" name="designation">
          <option value="Fateh Jang">Fateh Jang</option>
          <option value="Rawalpindi">Rawalpindi</option>
          <option value="Multan">Multan</option>
          <option value="Karachi">Karachi</option>
        </select>
        <label for="Designation">Designation</label>
        <select name="Designation" style="width: 59%; padding: 10px; margin: 5px 0 20px 0; display: inline-block; border: none; background: white;" id="designation" name="designation">
          <option value="IT_Expert">IT Expert</option>
          <option value="Junior_Constable">Junior Constable</option>
        </select>
        <label for="DeptCode">Dept code</label>
        <input type="text" name="DeptCode" value="" placeholder="Duty Code" required>

        <label for="Senior_Name">Senior</label>
        <input type="text" name="Senior_Name" value="" placeholder="Your senior name" required>

        <br />
        <label for="Duty_Shift">Duty shift</label>
        <select name="Duty_Shift" style="width: 56%; padding: 10px; margin: 5px 0 20px 0; display: inline-block; border: none; background: white;" id="dutyshift" name="designation">
          <option value="morning">7 AM - 1 PM</option>
          <option value="evening">2 PM - 9 PM</option>
          <option value="night">10 PM - 6 AM</option>
        </select>

        <label for="Joining_Date">Joining Date</label>
        <input type="date" id="date" name="Joining_Date" style="width: 52%; padding: 10px; margin: 5px 0 20px 0;">

      </div>
      <div class="thirddiv">
        <h3>Account Information</h3>
        <hr>
        <label for="Username">Username</label>
        <input type="text" name="Username" value="" placeholder="Set username" required>
        <br>
        <label for="Password">Password</label>
        <input type="text" name="Password" value="" placeholder="Set password" required>

        <label for="C_Password">Confirm</label>
        <input type="text" name="C_Password" value="" placeholder="Confirm password" required>


      </div>
      <div class="fourthdiv">
        <div class="imagesetting">
          <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;" required>
          <img class="imagepreview" id="output" width="200" /><br />
          <label for="file" style="cursor: pointer;">Upload Image</label>
        </div>
        <br />
        <br />
        <br />
        <button type="submit" name="" id="submitbtn">Create Account</button><br /><br />
        <button type="reset" value="reset" name="" id="clearbtn">Clear Fields</button>
      </div>

    </div>
    <button type="button" name="logoutbtn" id="logoutbtn" onclick="window.location.href='FrontHomePage.php'">Go back</button>
  </form>
</body>

</html>