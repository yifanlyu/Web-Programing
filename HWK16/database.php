<?php

    session_start();



    if ($_SESSION['user'] == '') {
        $user_array = Array();
        $users = fopen("passwd.txt", "r") or die("Unable to open");

        while (!feof($users)) {
          $line = fgets($users);
          $parts = explode(":", $line);
          if ($parts[0]!='') {
              $user_array[$parts[0]] = $parts[1];
          }
        }
        fclose($users);

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Login Failed";
            header("location: index.php"); // Redirecting to first page
        }
        // checking username and password
        elseif (isset($user_array[$username])) {
            // checking username and password match
            if (strcmp(trim($user_array[$username]), $password) == 0) {
                $_SESSION['user'] = trim($user_array[$username]);
            } else {
                $_SESSION['error'] = "Login Failed";
                header("location: index.php"); // Redirecting to first page
            }
        } else {
            $_SESSION['error'] = "Login Failed";
            header("location: index.php"); // Redirecting to first page
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Dbase</title>
    </head>
    <body>
        <h1><?php echo "Hello ".$_SESSION['user'] ?></h1>
        <br>
        <button type="button" onclick="location.href = 'insert.php';" name="Insert">Insert Student Record</button>
        <br>
        <button type="button" onclick="location.href = 'update.php';" name="Update">Update Student Record</button>
        <br>
        <button type="button" onclick="location.href = 'delete.php';" name="Delete">Delete Student Record</button>
        <br>
        <button type="button" onclick="location.href = 'view.php';" name="View">View Student Record</button>
        <br>
        <button type="button" onclick="location.href = 'index.php';" name="Logout">Logout</button>

    </body>
</html>
