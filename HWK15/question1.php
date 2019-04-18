<?php

    session_start();

    if ($_SESSION['q2c'] == 'yes') {
        $_SESSION['error1']="Don't go back to question 1!";
        header("Location:question2.php");
    } else {

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


      $score_array = Array();
      $results = fopen("results.txt", "r") or die("Unable to open");

      while (!feof($results)) {
        $line = fgets($results);
        $parts = explode(":", $line);
        if ($parts[0]!='') {
            $score_array[$parts[0]] = $parts[1];
        }
      }
      fclose($results);


      $username = $_POST['username'];
      $password = $_POST['password'];

      if (empty($username) || empty($password)) {
          $_SESSION['error'] = "Username or Password Invalid";
          header("location: index.php"); // Redirecting to first page
      }
      // checking username and password
      elseif (isset($user_array[$username])) {

          if (strcmp(trim($user_array[$username]), $password) == 0) {

              $_SESSION['user'] = $username;
              $_SESSION['score']=0;
              $_SESSION['loggedin_time'] = time();

              $results = fopen("results.txt", "a") or die("Unable to open");
              $user = $_SESSION['user'];
              $score = $_SESSION['score'];
              $txt=$user.':'.$score."\n";
              fwrite($results, $txt);
              fclose($results);

              if (isset($score_array[$username])) {
                  $_SESSION['error'] = "You have already taken the quiz!";
                  header("location: index.php"); // Redirecting to first page
              }
              if ($_SESSION['user'] == '') {
                  $_SESSION['error'] = "You are finished taking the quiz!";
                  header("location: index.php"); // Redirecting to first page
              }
          } else {
            $_SESSION['error'] = "Username or Password Invalid";
            header("location: index.php"); // Redirecting to first page
          }
      } else {
          $_SESSION['error'] = "Username or Password Invalid";
          header("location: index.php"); // Redirecting to first page
      }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <p>You have 15 minutes to take this quiz</p>
        <h1>Question 1</h1>


        <form id = "textForm" method = "post" action="question2.php">

             <p><b>1) According to Kepler the orbit of the earth is a circle with the sun at the center. </b></p>
             <input type="radio" name="one" value="true">true
             <input type="radio" name="one" value="false">false<br>
             <br/>
             <div>
                <input type = "submit" value = "Next" />
             </div>
        </form>
    </body>
</html>
