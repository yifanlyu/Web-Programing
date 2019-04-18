<?php
    session_start();

    //if not logged in
    if ($_SESSION['user'] == '') {
        $_SESSION['error'] = "You are finished taking the quiz!";
        header("location: index.php"); // Redirecting to first page
    }
    else {

        if ($_SESSION['q3c'] == 'yes') {
            $_SESSION['error2']="Don't go back to question 2!";
            header("Location:question3.php");
        }
        //all good
        elseif ($_SESSION['q2c'] == 'no') {
          //if is expired
            if(isLoginSessionExpired()) {
                header("Location:results.php?text=15 minutes expired");
            } else {
                $answer = $_POST['one'];
                $correct_answer='false';
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

                $_SESSION['q2c'] = 'yes';
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
        <h1>Question 2</h1>

        <span id="error">
            <!-- Initializing Session for errors --->
            <?php
            if (!empty($_SESSION['error1'])) {
            echo $_SESSION['error1'];
            unset($_SESSION['error1']);
            }
            ?>
        </span>

        <form id = "textForm" method = "post" action="question3.php">

            <p><b>2) Ancient astronomers did consider the heliocentric model of the solar system but rejected it because they could not detect parallax. </b></p>
            <input type="radio" name="two" value="true">true
            <input type="radio" name="two" value="false">false<br>
             <br/>
             <div>
                <input type = "submit" value = "Next" />
             </div>
        </form>
    </body>
</html>
