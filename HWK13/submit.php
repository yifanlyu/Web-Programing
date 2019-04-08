<?php

$eight='';
$nine='';
$ten='';
$eleven='';
$tweleve='';
$one='';
$two='';
$three='';
$four='';
$five='';



if(isset($_POST["eight"])){
  $eight = $_POST["eight"];
}
if(isset($_POST["nine"])){
  $nine = $_POST["nine"];
}
if(isset($_POST["ten"])){
  $ten = $_POST["ten"];
}
if(isset($_POST["eleven"])){
  $eleven = $_POST["eleven"];
}
if(isset($_POST["tweleve"])){
  $tweleve = $_POST["tweleve"];
}
if(isset($_POST["one"])){
  $one = $_POST["one"];
}
if(isset($_POST["two"])){
  $two = $_POST["two"];
}
if(isset($_POST["three"])){
  $three = $_POST["three"];
}
if(isset($_POST["four"])){
  $four = $_POST["four"];
}
if(isset($_POST["five"])){
  $five = $_POST["five"];
}



$myfiler = fopen("signup.txt", "r");
$timearray = array();

for ($i=0; $i < 10 ; $i++) {
    $line = fgets($myfiler);
    $timearray[$i] = $line;
}

fclose($myfiler);


$str='';

$myfilew = fopen("signup.txt", "w");

if(trim($timearray[0])=='' && $eight != ""){
  $str=$str.$eight."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";


}else if(trim($timearray[0])!='' && $eight != ""){
  echo("Sorry, your place is already taken");
  $str=$str.$timearray[0];


}else if(trim($timearray[0])!='' && $five == ""){
    $str=$str.$timearray[0];
}
else{
    $str=$str."\n";
}

if(trim($timearray[1])=='' && $nine != ""){
  $str=$str.$nine."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";


}else if(trim($timearray[1])!='' && $nine != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[1];


}else if(trim($timearray[1])!='' && $five == ""){
    $str=$str.$timearray[1];
}
else{
    $str=$str."\n";
}

if(trim($timearray[2])=='' && $ten != ""){
  $str=$str.$ten."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";


}else if(trim($timearray[2])!='' && $ten != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[2];


}else if(trim($timearray[2])!='' && $five == ""){
    $str=$str.$timearray[2];
}
else{
    $str=$str."\n";
}

if(trim($timearray[3])=='' && $eleven != ""){
  $str=$str.$eleven."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";

}else if(trim($timearray[3])!='' && $eleven != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[3];

}else if(trim($timearray[3])!='' && $five == ""){
    $str=$str.$timearray[3];
}
else{
    $str=$str."\n";
}

if(trim($timearray[4])=='' && $tweleve != ""){
  $str=$str.$tweleve."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";

}else if(trim($timearray[4])!='' && $tweleve != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[4];
}else if(trim($timearray[4])!='' && $five == ""){
    $str=$str.$timearray[4];
}
else{
    $str=$str."\n";
}

if(trim($timearray[5])=='' && $one != ""){
  $str=$str.$one."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";

}else if(trim($timearray[5])!='' && $one != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[5];

}else if(trim($timearray[5])!='' && $five == ""){
    $str=$str.$timearray[5];
}
else{
    $str=$str."\n";
}

if(trim($timearray[6])=='' && $two != ""){
  $str=$str.$two."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";

}else if(trim($timearray[6])!='' && $two != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[6];

}else if(trim($timearray[6])!='' && $five == ""){
    $str=$str.$timearray[6];
}
else{
    $str=$str."\n";
}

if(trim($timearray[7])=='' && $three != ""){
  $str=$str.$three."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";

}else if(trim($timearray[7])!='' && $three != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[7];

}else if(trim($timearray[7])!='' && $five == ""){
    $str=$str.$timearray[7];
}
else{
    $str=$str."\n";
}
if(trim($timearray[8])=='' && $four != ""){
  $str=$str.$four."\n";
  echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";

}else if(trim($timearray[8])!='' && $four != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[8];
}else if(trim($timearray[8])!='' && $five == ""){
    $str=$str.$timearray[8];
}
else{
    $str=$str."\n";
}

if(trim($timearray[9])==''  && $five != ""){
    $str=$str.$five."\n";
    echo "<a href='index.php'>Successfully Saved, Click to go back!</a>";

}else if(trim($timearray[9])!='' && $five != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[9];
}else if(trim($timearray[9])!='' && $five == ""){
    $str=$str.$timearray[9];
}
else{
    $str=$str."\n";
}

fwrite($myfilew, $str);

fclose($myfilew);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

    </body>
</html>
