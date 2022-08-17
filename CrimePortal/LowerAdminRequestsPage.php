<? php
include("connection.php");
include("functions.php");
    function Approve_request(){

    }
    function Decline_request(){

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LowerAdminRequestsPage.css">
    <title>Requests Page</title>
</head>
<body>
    <center>

        <form action="" method="post" enctype="multipart/form-data">
            <table width="50%" border="1" cellspacing="5" cellpadding="5">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Phone</th>
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
                    $query = "select * from loweradminrequest_tbl";
                    $query_run = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                        <tr>
                            <td>  <?php echo $row['S_No']; ?> </td>
                            <td> <?php echo '<img src="data:image;base64, '.base64_encode($row['Image']).'" alt="Image" style="width:70px; height:70px;" >'; ?> </td>
                            <td>  <?php echo $row['Name']; ?> </td>
                            <td>  <?php echo $row['CNIC']; ?> </td>
                            <td>  <?php echo $row['Phone']; ?> </td>
                            <td>  <?php echo $row['Designation']; ?> </td>
                            <td>  <?php echo $row['DeptCode']; ?> </td>
                            <td>  <?php echo $row['Username']; ?> </td>
                            <td> <button name="approvebtn" onclick="Approve_request()" ?sessionaid=$row[user_id] >Approve</button> </td>
                            <td> <button name="declinebtn" onclick="Decline_request()">Reject</button> </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </form>
    </center>
</body>
</html>
