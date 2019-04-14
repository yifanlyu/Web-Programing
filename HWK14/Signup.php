<?php ob_start(); ?>

<?php
function register(){

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!$_POST["username"] || !$_POST["password"]) {
            print('You did not fill in a required field.');
            print("<br /><a href=\"Signup.php\"> Back to Sign Up Page </a>");
            exit();
        }

        if(isset($_POST["username"])){

            // get username and password
            $username = $_POST["username"];
            $password = $_POST["password"];

            $pw = fopen("passwd.txt", "r");
            $users = Array();
            while(!feof($pw)){
                //Read Line
                $comb = fgets($pw);
                $un_pw = explode(":", $comb);
                $users[$un_pw[0]] = $un_pw[1];
            }
            fclose($pw);

            // check if it already exist and save

            if(!array_key_exists($username, $users)){
                $pw1 = fopen("passwd.txt", "a");
                fwrite($pw1, $username.":".$password."\n");
                fclose($pw1);


                print($username." has been successfully registered");
                print("<br /><a href=\"index.php\"> Back to homepage </a>");

                setcookie("id", $username, time()+120);
                setcookie("timeloggedin", time(), time()+120);


            }else{
                print("Username already exists!");
                print("<br /><a href=\"index.php\"> Back to homepage </a>");
             }
        }
  }else{
    if(isset($_COOKIE["id"])){

      print("You are already registered.");
      print("<br /><a href=\"index.php\"> Back to homepage </a>");
    }else{

      showRegister();
    }
  }
}


function showRegister(){ ?>
  <p>Please register first to view articles</p>
  <form method="post" action="#">
    Username: <input type="text" name="username" /><br />
    Password: <input type="password" name="password" /><br />
    <input type="submit" name="submit" value="Submit" />
    <input type="reset" name="reset" value="Reset" />

  </form>
  <a href="index.php"> Back to the homepage </a>

<?php }
?>


<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="./Signup.css">

    </head>
    <body>
        <?php register(); ?>
        <br>
    </body>
</html>
<?php ob_flush(); ?>
