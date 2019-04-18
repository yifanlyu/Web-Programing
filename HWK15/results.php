<?php
    session_start();

    if ($_SESSION['user'] == '') {
      $_SESSION['error'] = "You are finished taking the quiz!";
      header("location: index.php"); // Redirecting to first page
    }
    else {

        if(isLoginSessionExpired()) {
            if ($_GET['text']!="15 minutes expired") {
                $expired = "15 minutes expired";
            }
        } else {
            $answer = $_POST['six'];
            $correct_answer='age';
            if ($_SESSION['results'] = 'no') {
                if (strcmp($answer, $correct_answer) == 0) {
                  $_SESSION['score']+=10;
                  $_SESSION['results'] = 'yes';
                }
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

        }
        session_destroy();
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

        <h1>Results</h1>
        <?php echo $_GET['text']; ?>
        <?php echo $expired; ?>
        </br>

        <span id="error">
            <!-- Initializing Session for errors --->
            <?php
            if (!empty($_SESSION['error6'])) {
            echo $_SESSION['error6'];
            unset($_SESSION['error6']);
            }
            ?>
        </span>

        <?php echo "Your score is: ".$_SESSION['score']." out of 60."; ?>

    </body>

</html>
