<?php
    session_start();
    if ($_SESSION['user'] == '') {
        $_SESSION['error'] = "You are finished taking the quiz!";
        header("location: index.php"); // Redirecting to first page
    } else {
        if ($_SESSION['q4c'] == 'yes') {
            $_SESSION['error3']="Don't go back to question 3!";
            header("Location:question4.php");
        }
        elseif ($_SESSION['q3c'] == 'no') {

            //if is expired
            if(isLoginSessionExpired()) {
                header("Location:results.php?text=15 minutes expired");
            } else {
                $answer = $_POST['two'];
                $correct_answer='true';
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

                $_SESSION['q3c'] = 'yes';
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
        <h1>Question 3</h1>

        <span id="error">
            <!-- Initializing Session for errors --->
            <?php
            if (!empty($_SESSION['error2'])) {
            echo $_SESSION['error2'];
            unset($_SESSION['error2']);
            }
            ?>
        </span>

        <form id = "textForm" method = "post" action="question4.php">

            <p><b>3) The total amount of energy that a star emits is directly related to its </b></p>
            <input type="checkbox" name="three" value="gravity">surface gravity and magnetic field<br>
            <input type="checkbox" name="three" value="radius">radius and temperature<br>
            <input type="checkbox" name="three" value="pressure">pressure and volume<br>
            <input type="checkbox" name="three" value="location">location and velocity <br>
            <div>
              <input type = "submit" value = "Next" />
            </div>
        </form>
    </body>
</html>
