<?php
session_start();

if ($_SESSION['user'] != '') {
    session_destroy();
    echo "Thank you!";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h2>Login</h2>
         <span id="error">
         <!-- Initializing Session for errors --->
         <?php
         if (!empty($_SESSION['error'])) {
         echo $_SESSION['error'];
         unset($_SESSION['error']);
         }
         ?>
         </span>

         <form method="post" action="database.php">
             Username: <input type="text" name="username" /><br />
             Password: <input type="text" name="password" /><br />
             <input type="submit" name="submit" value="Login" />
             <input type="reset" name="reset" value="Reset" />
         </form>

    </body>
</html>
