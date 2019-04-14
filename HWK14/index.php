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
        <div class="mainleft">
            <div class="topleft">
                <div class="headline">
                    <div class="headimagewrap">
                        <div class="headimage">
                            <a href="headline1.php">
                                <img src="./img/deer1.jpg" alt="deer image" width="700">
                            </a>
                        </div>
                        <div class="imgcaption">
                            A white tail deer infected by chronic wasting disease tried to eat other deers at State Game Lands Number 72.
                        </div>
                    </div>
                    <div class="headlinetitle">
                        <h1>
                            <a href="headline1.php">
                                "Zombie Deer Disease" found in Clarion - Are Humans at risk?
                            </a>
                        </h1>
                    </div>
                    <div class="headlinecontent">
                        <ul style="list-style-type:disc;">
                          <li>Study tracking people who ate zombie deer meat found no ill-effects, so far.</li>
                          <li>Clarion officials concerned after 183 deer test positive for ‘zombie’ disease.</li>
                          <li>Chronic wasting disease (CWD) is a prion disease, which means it’s caused by proteins (called prions) that attack the brain and spinal tissue.</li>
                        </ul>
                    </div>
                </div>

                <div class="leftcol">
                    <div class="leftfirst">
                        <div class="leftimg">
                            <a href="headline2.php">
                                <img src="./img/explosion.jpg" alt="explosion" width="245">
                            </a>
                        </div>

                        <div class="ltitle">
                            <a href="headline2.php">
                            Massive Explosion in Austin, TX, injured severals.
                            </a>
                        </div>

                        <div class="lfcaption">
                            Explosion with white smoke in Austin, TX
                        </div>

                        <div class="lfcontent">
                            This explision happened at 3:15pm Friday. Austin Police Department and Fire Department responded immediately. There are currently 7 people injured. We are still unclear what caused this explosion. FBI and local law enforcement are working together closely investing the possible causes.
                        </div>

                    </div>
                </div>

                <div class="rightcol">
                    <div class="rightfirst">
                        <div class="rightimg">
                            <a href="headline3.php">
                                <img src="./img/fencing.jpg" alt="fencing" width="245">
                            </a>
                        </div>

                        <div class="rtitle">
                            <a href="headline3.php">
                            Erminio Li Fonti winning the World Fencing Championships
                            </a>
                        </div>

                        <div class="rtcaption">
                            Erminio Li Fonti with his fencing sword
                        </div>


                        <div class="rfcontent">
                            Italy's dominant world number one Erminio Li Fontihas won his tenth career World Fencing Championships gold medal at the St. Maur event in France just over a week ago.
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottomleft">
                <div class="bottomtop">
                    <div class="bleft">
                        <div class="btitle">
                            <a href="#">National</a>
                        </div>
                        <div class="picture">
                            <a href="national1.php">
                                <img src="./img/ggb.jpg" alt="Golden Gate Bridge" width="270">
                            </a>
                        </div>
                        <div class="column">
                            <div class="bfirst">
                                <a href="national1.php">California earthquake destroyed Golden Gate Bridge</a>
                            </div>
                            <div class="bsecond">
                                <a href="national2.php">Texas cities suffered from their coldest day since 1919</a>
                            </div>
                            <div class="bthird">
                                <a href="national3.php">Road ice caused 10 death on highway 67</a>
                            </div>
                        </div>
                    </div>
                    <div class="bmiddle">
                        <div class="btitle">
                            <a href="#">International</a>
                        </div>
                        <div class="picture1">
                            <a href="#">
                                <img src="./img/Eiffel.jpg" alt="Eiffel Tower" width="130" >
                            </a>
                        </div>
                        <div class="column">
                            <div class="bfirst">
                                <a href="#">Eiffel Tower closed indefinitely</a>
                            </div>
                            <div class="bsecond">
                                <a href="#">China Elected its first female President</a>
                            </div>
                            <div class="bthird">
                                <a href="#">Brazil declares war against the United States</a>
                            </div>
                        </div>
                    </div>
                    <div class="bright">
                        <div class="btitle">
                            <a href="#">Metro</a>
                        </div>
                        <div class="picture">
                            <a href="#">
                                <img src="./img/musician.jpg" alt="musician" width="270">
                            </a>
                        </div>
                        <div class="column">
                            <div class="bfirst">
                                <a href="#">Clarion musician calls for help despite positive report on industry</a>
                            </div>
                            <div class="bsecond">
                                <a href="#">Clarion saw huge surge in wealthy renters over past decade, report says</a>
                            </div>
                            <div class="bthird">
                                <a href="#">Where to celebrate National Margarita Day in Clarion</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottombottom">
                    <div class="bleft">
                        <div class="btitle">
                            <a href="#">Business</a>
                        </div>
                        <div class="picture">
                            <a href="#">
                                <img src="./img/econ.jpg" alt="econ" width="270">
                            </a>
                        </div>
                        <div class="column">
                            <div class="bfirst">
                                <a href="#">Newest rounds of economic crisis could come in 2029</a>
                            </div>
                            <div class="bsecond">
                                <a href="#">Walmart acquired Amazon for 2.3 billion dollars</a>
                            </div>
                            <div class="bthird">
                                <a href="#">China became the world's largest economy</a>
                            </div>
                        </div>
                    </div>
                    <div class="bmiddle">
                        <div class="btitle">
                            <a href="#">Sports</a>
                        </div>
                        <div class="picture">
                            <a href="#">
                                <img src="./img/f1.jpg" alt="F1" width="270">
                            </a>
                        </div>
                        <div class="column">
                            <div class="bfirst">
                                <a href="#">Daniel Riccardo won the f1 world championship</a>
                            </div>
                            <div class="bsecond">
                                <a href="#">Wu Lei wins Ballon d'Or </a>
                            </div>
                            <div class="bthird">
                                <a href="#">The New England Patriots quit NFL</a>
                            </div>
                        </div>
                    </div>
                    <div class="bright">
                        <div class="btitle">
                            <a href="#">Arts & Leisure</a>
                        </div>
                        <div class="picture">
                            <a href="#">
                                <img src="./img/lifestyle.jpg" alt="Lifestyle" width="270">
                            </a>
                        </div>
                        <div class="column">
                            <div class="bfirst">
                                <a href="#">Disney's Epcot Is About to Change Forever — Here's What to Expect</a>
                            </div>
                            <div class="bsecond">
                                <a href="#">Yifan's drawing could fetch $12.7 million at Sotheby's Hong Kong</a>
                            </div>
                            <div class="bthird">
                                <a href="#">Traveling in a spaceship is the newest fashion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mainright">
            <h3>
                <span>
                    <a href="#">Financial Market</a>
                </span>
            </h3>

            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                    <script src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                      {
                      "showChart": true,
                      "locale": "en",
                      "largeChartUrl": "",
                      "width": "400",
                      "height": "600",
                      "plotLineColorGrowing": "rgba(33, 150, 243, 1)",
                      "plotLineColorFalling": "rgba(33, 150, 243, 1)",
                      "gridLineColor": "rgba(233, 233, 234, 1)",
                      "scaleFontColor": "rgba(131, 136, 141, 1)",
                      "belowLineFillColorGrowing": "rgba(5, 122, 205, 0.12)",
                      "belowLineFillColorFalling": "rgba(5, 122, 205, 0.12)",
                      "symbolActiveColor": "rgba(225, 239, 249, 1)",
                      "tabs": [
                        {
                          "title": "Indices",
                          "symbols": [
                            {
                              "s": "INDEX:S",
                              "d": "S&P 500"
                            },
                            {
                              "s": "INDEX:XLY0",
                              "d": "Shanghai Composite"
                            },
                            {
                              "s": "INDEX:DOWI",
                              "d": "Dow 30"
                            },
                            {
                              "s": "INDEX:NKY",
                              "d": "Nikkei 225"
                            },
                            {
                              "s": "INDEX:DAX",
                              "d": "DAX Index"
                            }
                          ],
                          "originalTitle": "Indices"
                        },
                        {
                          "title": "Commodities",
                          "symbols": [
                            {
                              "s": "CME_MINI:ES1!",
                              "d": "E-Mini S&P"
                            },
                            {
                              "s": "CME:E61!",
                              "d": "Euro"
                            },
                            {
                              "s": "COMEX:GC1!",
                              "d": "Gold"
                            },
                            {
                              "s": "NYMEX:CL1!",
                              "d": "Crude Oil"
                            },
                            {
                              "s": "NYMEX:NG1!",
                              "d": "Natural Gas"
                            },
                            {
                              "s": "CBOT:ZC1!",
                              "d": "Corn"
                            }
                          ],
                          "originalTitle": "Commodities"
                        },
                        {
                          "title": "Bonds",
                          "symbols": [
                            {
                              "s": "CME:GE1!",
                              "d": "Eurodollar"
                            },
                            {
                              "s": "CBOT:ZB1!",
                              "d": "T-Bond"
                            },
                            {
                              "s": "CBOT:UD1!",
                              "d": "Ultra T-Bond"
                            },
                            {
                              "s": "EUREX:GG1!",
                              "d": "Euro Bund"
                            },
                            {
                              "s": "EUREX:II1!",
                              "d": "Euro BTP"
                            },
                            {
                              "s": "EUREX:HR1!",
                              "d": "Euro BOBL"
                            }
                          ],
                          "originalTitle": "Bonds"
                        },
                        {
                          "title": "Forex",
                          "symbols": [
                            {
                              "s": "FX:EURUSD"
                            },
                            {
                              "s": "FX:GBPUSD"
                            },
                            {
                              "s": "FX:USDJPY"
                            },
                            {
                              "s": "FX:USDCHF"
                            },
                            {
                              "s": "FX:AUDUSD"
                            },
                            {
                              "s": "FX:USDCAD"
                            }
                          ],
                          "originalTitle": "Forex"
                        }
                      ]
                    }

                    </script>
            </div>
            <!-- TradingView Widget END -->
            <div class="video">
                <h3>
                <span>
                    <a href="#">Video</a>
                </span>
                </h3>

                <video width="410" height="260" controls>
                  <source src="./vid/news.mp4" type="video/mp4">
                Your browser does not support the video tag.
                </video>

                <p class="caption">
                    Due to climate change, penguins started to occupy Clarion river, attracting tons of people to watch.
                </p>
            </div>
            <div class="Opinions">
                <h3>
                    <span>
                        <a href="#">Opinions</a>
                    </span>
                </h3>
                <div class="mainopinion">
                    <div class="opsmall">
                        <div class="editor">
                            Robert A. Tardy
                        </div>
                        <div class="Opiniontext">
                            <a href="#">
                                Fenves Has an Advantage, and It’s Not About Transcript Fee
                            </a>
                        </div>
                        <div class="image">
                            <a href="#">
                                <img src="./img/fenves.jpg" alt="fenves" width="70">
                            </a>
                        </div>

                    </div>
                    <div class="opsmall">
                        <div class="editor">
                            Sara Cotton
                        </div>

                        <div class="Opiniontext">
                            <a href="#">
                                Don't Eat Deers
                            </a>
                        </div>
                        <div class="image">
                            <a href="#">
                                <img src="./img/deer.jpg" alt="fenves" width="70">
                            </a>
                        </div>
                    </div>
                    <div class="opsmall">
                        <div class="editor">
                            Igor Almeida Martins
                        </div>
                        <div class="Opiniontext">
                            <a href="#">
                                Amazon Should Have HQ2 In Clarion
                            </a>
                        </div>
                        <div class="image">
                            <a href="#">
                                <img src="./img/amazon.png" alt="fenves" width="70">
                            </a>
                        </div>
                    </div>
                    <div class="opsmall">
                        <div class="editor">
                            Maximus Corporaal
                        </div>
                        <div class="Opiniontext">
                            <a href="#">
                                Protests Against Climate Change is Effective
                            </a>
                        </div>
                        <div class="image">
                            <a href="#">
                                <img src="./img/protest.jpg" alt="fenves" width="70">
                            </a>
                        </div>
                    </div>
                    <div class="opsmall">
                        <div class="editor">
                            Patrick Wurfel
                        </div>
                        <div class="Opiniontext">
                            <a href="#">
                                Aging of Population  is the Biggest Challenge for Calrion Future
                            </a>
                        </div>
                        <div class="image">
                            <a href="#">
                                <img src="./img/aging.jpg" alt="fenves" width="70">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
