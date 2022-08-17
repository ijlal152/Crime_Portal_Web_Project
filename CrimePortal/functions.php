<?php
  function check_login($con)
  {
    if (isset($_SESSION['user_id']))
    {
      $id = $_SESSION['user_id'];
      $query = "select * from superadmin_tbl where user_id = '$id' limit 1";

      $result = mysqli_query($con, $query);
      if($result && mysqli_num_rows($result) > 0)
      {
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
      }
    }
    // redirect to login
    header("Location: FrontHomePage.php");
    die;
  }


function random_num($length){
  $text = "";
  if($length < 7){
    $length = 7;
  }
  $len = rand(1, $length);
  for ($i=0; $i < $len ; $i++) {
    # code..
    $text .= rand (0, 7);
 }
 return $text;
}
