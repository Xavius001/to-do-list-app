<!-- Checks if user is logged in. If not logged in return to home page -->
<?php
   include('config.php');
   session_start();


   if(isset($_SESSION['login_user'])) {
    $email_check = $_SESSION['login_user'];


    $ses_sql = mysqli_query($db, "select * from users where email = '$email_check' ");

    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

    $login_session = $row['email'];
   }

   else {
      header("location: ..\login\login.html");
    die();
   }
?>