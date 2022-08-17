<?php
  include("connection.php");
  include("functions.php");

 ?>




 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Update</title>
     <link rel="stylesheet" href="">
   </head>
   <body>
     <form action="" method="GET">

     <div class="maincontentdiv">
       <label for="Name">Name</label>
       <input type="text" name="Name" value="" placeholder="Your Full name" required>
       <br/>
       <label for="CNIC">CNIC</label>
       <input type="text" name="CNIC" value="" placeholder="Your CNIC" required>

       <p>Slect you gender</p>
       <input type="radio" id="male" name="gender" value="male" />
       <label for="male">Male</label>

       <input type="radio" id="female" name="gender" value="female" />
       <label for="female">Female</label>

       <input type="radio" id="other" name="gender" value="other" />
       <label for="other">Other</label>
       <br/>
       <br/>

       <label for="Email">Email</label>
       <input type="email" name="Email" value="" placeholder="eg: example@gmail.com" required>
       <br/>

       <label for="Phone">Phone</label>
       <input type="text" name="Phone" value="" placeholder="eg: 0300000000" required>
       <br/>
       <label for="Area">Area</label>
       <select name="Area"  id="area" name="designation">
             <option value="Fateh Jang">Fateh Jang</option>
             <option value="Rawalpindi">Rawalpindi</option>
             <option value="Multan">Multan</option>
             <option value="Karachi">Karachi</option>
       </select><br/>
       <label for="Designation">Designation</label>
       <select name="Designation" id="designation" name="designation">
             <option value="IT_Expert">IT Expert</option>
             <option value="Junior_Constable">Junior Constable</option>
       </select><br/>
       <label for="DeptCode">Dept code</label>
       <input type="text" name="DeptCode" value="" placeholder="Duty Code" required><br/>
       <label for="Username">Username</label>
       <input type="text" name="Username" value="" placeholder="Set username" required>
       <br/>

       <input type="submit" name="submitbtn" value="Update Record">
       <?php

       if($_GET['submit']){
         $name = $_GET['Name'];
         $cnic = $_GET['CNIC'];
         $gender = $_GET['Gender'];
         $email = $_GET['Email'];
         $phone = $_GET['Phone'];
         $area = $_GET['Area'];
         $designation= $_GET['Designation'];
         $deptcode = $_GET['DeptCode'];
         $username = $_GET['Username'];
         $update_query = "update loweradminrequest_tbl set Name='$name', CNIC='$cnic', Gender='$gender', Email='$email', Phone='$phone',
         Area='$area', Designation='$designation', DeptCode='$deptcode', Username='$username'  where CNIC='$cnic'";
        $data =  mysqli_query($con, $update_query);
        if($data){
          echo "Record updated successfully..";
        }else{
          echo "Record not updated";
        }
       }

        ?>

    </div>
     </form>
   </body>
 </html>
