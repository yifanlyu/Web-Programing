<?php
    session_start();
    if ($_SESSION['user'] == '') {
        $_SESSION['error'] = "You are finished taking the quiz!";
        header("location: index.php"); // Redirecting to first page
    }else {
        if ($_SESSION['results'] == 'yes') {
            $_SESSION['error']="Don't go back to question 6!";
            header("Location:results.php");
        }
        elseif ($_SESSION['q6c'] == 'no') {

          //if is expired
            if(isLoginSessionExpired()) {
                header("Location:results.php?text=15 minutes expired");
            }else {
                $answer = $_POST['five'];
                $correct_answer='galaxy';
                if (strcmp($answer, $correct_answer) == 0) {
                  $_SESSION['score']+=10;
                }

                $lines = file('results.txt');
                $last = sizeof($lines) - 1 ;
                unset($lines[$last]);

                $results = fopen("results.txt", "w") or die("Unable to open");
                $user = $_SESSION['user'];
                $score = $_SESSION['score'];
                $txt=$user.':'.$score."\n";

                fwrite($results,implode('',$lines).$txt);
                fclose($results);

                $_SESSION['q6c'] = 'yes';
            }
        }
    }

    function isLoginSessionExpired() {
      $login_session_duration = 900;
      $current_time = time();

      if(isset($_SESSION['loggedin_time']) and isset($_SESSION["user"])){
        if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){
    	    return true;
        }
      }
      return false;
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Question 6</h1>

        <span id="error">
            <!-- Initializing Session for errors --->
            <?php
            if (!empty($_SESSION['error5'])) {
            echo $_SESSION['error5'];
            unset($_SESSION['error5']);
            }
            ?>
        </span>

        <form id = "textForm" method = "post" action="results.php">

            <p><b>6) The inverse of the Hubble's constant is a measure of the _____ of the universe.</b></p>
            <input type="text" id="six" name="six"><br/><br/>
            <div>
              <input type = "submit" value = "Next" />
            </div>
        </form>
    </body>
</html>
