<?php
session_start(); // Session starts here.
$_SESSION['q2c'] = 'no';
$_SESSION['q3c'] = 'no';
$_SESSION['q4c'] = 'no';
$_SESSION['q5c'] = 'no';
$_SESSION['q6c'] = 'no';
$_SESSION['results'] = 'no';

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

         <form method="post" action="question1.php">
             Username: <input type="text" name="username" /><br />
             Password: <input type="text" name="password" /><br />
             <input type="submit" name="submit" value="Submit" />
             <input type="reset" name="reset" value="Reset" />
         </form>

    </body>
</html>
