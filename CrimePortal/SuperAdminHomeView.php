<?php
    session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SuperAdminHomeView.css">
    <title>Super Admin Home</title>
</head>
<body>
    <div class="HeaderDiv">
        <h1>Super admin main console</h1>
        <marquee behavior="alternate"> <b>Welcome <?php echo $user_data['Name']; ?> </b>  </marquee>
    </div>

    <div style="text-align:center">
        <img src="Images/admin.png" width="140px" height="140px" style="margin-top:5px"/>
    </div>

    <div class="maindiv" style="text-align:center">
        <div id="firstdiv">
            <h3>Approve requests</h3>
            <p>Here you can check all requests for new accounts by lower admins</p>
            <p>No of requests</p>
            <p style="font-size:20px">0</p>
            <button onclick="document.location='LowerAdminRequestsPage.php'">Check requests</button>
        </div>

        <div id="seconddiv">
            <h3>Update / Delete Record</h3>
            <p>You can update and delete lower admin account and he will not be able to operate the system</p>
            <button onclick="document.location='LowerAdminRecords.php'">Update record</button>
        </div>
        <div id="thirddiv">
            <h3>Check crime rate</h3>
            <p>You can see crime rate of any city</p>
            <button onclick="document.location=''">Crime rate</button>
        </div>
    </div>
    <div id="logoutbtn">
        <button onclick="document.location='FrontHomePage.php'">Logout</button>
    </div>

</body>
</html>
