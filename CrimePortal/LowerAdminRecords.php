<?php
  include("connection.php");
  //include("functions.php");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>All records</title>
  </head>
  <body>
    <center>
      <h2>Update / Delete lower admin records</h2>
        <form action="" method="get">
            <table width="50%" border="5" cellspacing="5px" cellpadding="10px">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Area</th>
                        <th>Designation</th>
                        <th>DeptCode</th>
                        <th>Username</th>
                        <th colspan="3">Operations</th>

                    </tr>
                </thead>
                <?php
                    include("connection.php");
                    include("functions.php");
                    //$session_id = $_GET['sessionalid'];
                    $query = "select S_No, Name, CNIC, Gender, Email, Phone, Area, Designation, DeptCode, Username from loweradminrequest_tbl";
                    $query_run = mysqli_query($con, $query);
                    //$total = mysqli_num_rows($query_run);
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                        ?>
                        <tr>
                            <td>  <?php echo $row['S_No']; ?> </td>
                            <td>  <?php echo $row['Name']; ?> </td>
                            <td>  <?php echo $row['CNIC']; ?> </td>
                            <td>  <?php echo $row['Gender']; ?> </td>
                            <td>  <?php echo $row['Email']; ?> </td>
                            <td>  <?php echo $row['Phone']; ?> </td>
                            <td>  <?php echo $row['Area']; ?> </td>
                            <td>  <?php echo $row['Designation']; ?> </td>
                            <td>  <?php echo $row['DeptCode']; ?> </td>
                            <td>  <?php echo $row['Username']; ?> </td>
                            <td> <a href='loweradminupdate.php'>Update</a> </td>
                            <td> <a href="#">Delete</a> </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </form>
    </center>
  </body>
</html>
