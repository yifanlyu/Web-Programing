<?php
    ob_start();
    function login(){

    //Login is included at the start of each page to see if they are logged in.
    if($_SERVER['REQUEST_METHOD'] === 'POST'){ //Form has been posted
      if(isset($_POST["username"])){
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

        if(array_key_exists($username, $users) && strcmp($userlist[$username], $password)){
          setcookie("id", $username, time()+120);
          setcookie("timeloggedin", time(), time()+120);
          echo '<script language="javascript">';
            echo 'alert("You are successfully logged in!")';
            echo '</script>';

        }else{
            echo '<script language="javascript">';
              echo 'alert("Wrong username and password combinations!")';
              echo '</script>';
        }
      }
    }
  }
  function check(){
      ob_start();

      if(isset($_COOKIE["id"])){
          print('An infectious disease deadly in deer has spread to 24 states, and experts warned that the ailment – unofficially dubbed "zombie" deer disease – could one day hit humans.
Chronic wasting disease, or CWD, has afflicted free-ranging deer, elk and/or moose in 24 states and two Canadian provinces as of January, the Centers for Disease Control and Prevention said.

');
      }else{
        print('please log in');
      }
  }

  ob_flush();
  print('<form style="float: right;"method="post" action="#">');
  print('Username: <input type="text" name="username" />');
  print('Password: <input type="text" name="password" />');
  print('<button type="submit" name="button">Log In</button>');
  print('<button type="button" name="button" onclick=\'location.href="Signup.php"\'>Sign Up</button>');
  print('</form>');
?>



<!DOCTYPE html>
<html lang="en">
<title>The Daily Clarion</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./newspaper.css">


<body>
    <div class="topcon">

        <div class="left">
            <p id="date"></p>

            <script>
            const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
            ];
            n =  new Date();
            y = n.getFullYear();
            m = monthNames[n.getMonth()];
            d = n.getDate();
            document.getElementById("date").innerHTML = m + " " + d + ", " + y;
            </script>
        </div>


        <div class="middle">
            <a href="index.php">
            <img id="title" src="./img/title2.png" alt="The Daily Clarion"/>
            </a>
        </div>

        <div class="right">
            <div class="account">

                <?php login(); ?>

            </div>
            <div class="weather" style="width: 250px;">
                <iframe style="display: block;" src="https://cdnres.willyweather.com/widget/loadView.html?id=102933" width="250" height="42"></iframe>
                <a style="text-indent: -9999em;height: 42px;float: right;display: block;position: relative;width: 20px;z-index: 1;margin: -42px 0px 0px 0px" href="https://www.willyweather.com/pa/clarion-county/clarion.html" rel="nofollow">clarion PA weather forecast
                </a>
            </div>
        </div>
    </div>

    <div class="topnav">
        <a href="" class="navitem">National</a>
        <a href="" class="navitem">International</a>
        <a href="" class="navitem">Metro</a>
        <a href="" class="navitem">Business</a>
        <a href="" class="navitem">Sports</a>
        <a href="" class="navitem">Arts</a>
        <a href="" class="navitem">Leisure</a>
        <a href="" class="navitem">Editorials</a>
        <a href="" class="navitem">Opinions</a>
        <a href="" class="navitem">Classifieds</a>
    </div>

    <div class="footer">
        <br>
            <a href="">
                © 2019 The Daily Clarion Company
            </a>
            <br>
            <a href="">
                Contact Us
            </a>
    </div>
    <div class="main">
        <?php check(); ?>

    </div>

</body>
</html>
