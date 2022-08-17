<?php

session_start();
include("connection.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Username = $_POST['superusername'];
    $Password = $_POST['superpassword'];
    if (!empty($Username) && !empty($Password) && !is_numeric($Username)) {
        //$user_id = random_num(7);
        $query = "select * from superadmin_tbl where Username = '$Username' and Password = '$Password'";
        $result = mysqli_query($con, $query);
        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        //$count = mysqli_num_rows($result); 
        // if($count == 1){  
        //   echo "<script>Login successful</script>";
        //  header("Location: SuperAdminHomeView.php");
        // die;  
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['Password'] == $Password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: SuperAdminHomeView.php");
                    die;
                }
            }
        }
        echo "<script>Wrong Username or password</script>";
    }
    // else{  
    //    echo "<script>Login failed. Invalid username or password.</script>";   
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="FrontHomePage.css">
    <title>Crime Portal</title>
</head>

<body>
    <div class="HeaderDiv">
        <h1>Crime Branch Police Department Pakistan</h1>
        <marquee behavior="alternate"> <b>Police helpline (15) Pakistan Zindabad</b> </marquee>
    </div>

    <div class="superadminloginheader">
        <img id="adminimage" src="Images/profile.png" />
        <hr />
        <div class="main">
            <p class="sign" align="center">Super admin login</p>
            <form class="form1" method="post" action="">
                <input class="un " type="text" align="center" id="superusername" name="superusername" placeholder="Username" required />
                <input class="pass" type="password" align="center" id="superpassword" name="superpassword" placeholder="Password" required />
                <input type="submit" name="loginbtn">
            </form>
        </div>
    </div>

    <div class="loginheader">
        <img id="headimage" src="Images/loginlogo.png" />
        <hr />
        <div class="main">
            <p class="sign" align="center">Sign in</p>
            <form class="form1" method="post" action=>
                <input class="un " type="text" align="center" name="adminname" id="adminname" placeholder="Username" required>
                <input class="pass" type="password" align="center" name="adminpassword" id="adminpassword" placeholder="Password" required>
                <a class="submit" align="center" href="MainPage.php">Sign in</a>
                <p class="newaccount" align="center"><a href="LowerAdminSignUp.php">Create account </a> </p>
            </form>
        </div>
    </div>
</body>

</html>