<?php
    session_start();
    if ($_SESSION['user'] == '') {
        $_SESSION['error'] = "You are finished taking the quiz!";
        header("location: index.php"); // Redirecting to first page
    }else {
        if ($_SESSION['q5c'] == 'yes') {
            $_SESSION['error4']="Don't go back to question 4!";
            header("Location:question5.php");
        }
        elseif ($_SESSION['q4c'] == 'no') {

          //if is expired
            if(isLoginSessionExpired()) {
                header("Location:results.php?text=15 minutes expired");
            } else {
                $answer = $_POST['three'];
                $correct_answer='radius';
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

                $_SESSION['q4c'] = 'yes';
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
        <h1>Question 4</h1>

        <span id="error">
            <!-- Initializing Session for errors --->
            <?php
            if (!empty($_SESSION['error3'])) {
            echo $_SESSION['error3'];
            unset($_SESSION['error3']);
            }
            ?>
        </span>

        <form id = "textForm" method = "post" action="question5.php">

            <p><b>4) Stars that live the longest have </b></p>
            <input type="checkbox" name="four" value="highMass">high mass<br>
            <input type="checkbox" name="four" value="temp">high temperature<br>
            <input type="checkbox" name="four" value="hydrogen">lots of hydrogen<br>
            <input type="checkbox" name="four" value="smallMass">small mass<br>
            <div>
              <input type = "submit" value = "Next" />
            </div>
        </form>
    </body>
</html>
