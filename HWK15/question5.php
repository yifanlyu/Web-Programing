<?php
    session_start();
    if ($_SESSION['user'] == '') {
        $_SESSION['error'] = "You are finished taking the quiz!";
        header("location: index.php"); // Redirecting to first page
    }else {
        if ($_SESSION['q6c'] == 'yes') {
            $_SESSION['error5']="Don't go back to question 5!";
            header("Location:question6.php");
        }
        elseif ($_SESSION['q5c'] == 'no')  {

          //if is expired
            if(isLoginSessionExpired()) {
                header("Location:results.php?text=15 minutes expired");
            } else {
                $answer = $_POST['four'];
                $correct_answer='smallMass';
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

                $_SESSION['q5c'] = 'yes';
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
        <h1>Question 5</h1>

        <span id="error">
            <!-- Initializing Session for errors --->
            <?php
            if (!empty($_SESSION['error4'])) {
            echo $_SESSION['error4'];
            unset($_SESSION['error4']);
            }
            ?>
        </span>

        <form id = "textForm" method = "post" action="question6.php">

            <p><b>5) A collection of a hundred billion stars, gas, and dust is called a _____.</b></p>
            <input type="text" id="five" name="five"><br/><br/>
            <div>
              <input type = "submit" value = "Next" />
            </div>
        </form>
    </body>
</html>
