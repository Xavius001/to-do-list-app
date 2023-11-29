<?php
   include("../global/config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // email and password sent from form
      $myEmail = mysqli_real_escape_string($db,$_POST['email']);
      $myPassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM customers WHERE email = '$myEmail'";
      $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {

        $hashedPassword = $row['password'];
        if(password_verify($myPassword, $hashedPassword)) {

            //session_register("myEmail");
            $_SESSION['login_user'] = $myEmail;
            echo "Login success.";
        }
    } else {
        echo "Your Email or Password is invalid";
    }


   }
?>