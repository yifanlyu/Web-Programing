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

//print_r($slotTaken);
fclose($myfiler);


$str='';

$myfilew = fopen("signup.txt", "w");
if(trim($timearray[0])=='' && $eight != ""){
  $str=$str.$eight."\n";
}else if($eight != ""){
  echo("Sorry, your place is already taken");
  $str=$str.$timearray[0];
}else{
    $str=$str."\n";
}

if(trim($timearray[1])==''&& $nine != ""){
  $str=$str.$nine."\n";
}else if($nine != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[1];
}else{
    $str=$str."\n";
}

if(trim($timearray[2])=='' && $ten != ""){
  $str=$str.$ten."\n";
}else if($ten != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[2];

}else{
    $str=$str."\n";
}

if(trim($timearray[3])=='' && $eleven != ""){
  $str=$str.$eleven."\n";
}else if($eleven != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[3];

}else{
    $str=$str."\n";
}

if(trim($timearray[4])=='' && $tweleve != ""){
  $str=$str.$tweleve."\n";
}else if($tweleve != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[4];
}else{
    $str=$str."\n";
}

if(trim($timearray[5])=='' && $one != ""){
  $str=$str.$one."\n";
}else if($one != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[5];

}else{
    $str=$str."\n";
}

if(trim($timearray[6])=='' && $two != ""){
  $str=$str.$two."\n";
}else if($two != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[6];

}else{
    $str=$str."\n";
}

if(trim($timearray[7])=='' && $three != ""){
  $str=$str.$three."\n";
}else if($three != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[7];

}else{
    $str=$str."\n";
}

if(trim($timearray[8])=='' && $four != ""){
  $str=$str.$four."\n";
}else if($four != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[8];
}else{
    $str=$str."\n";
}

if(trim($timearray[9])==''  && $five != ""){
  $str=$str.$five."\n";
}else if($five != ""){
    echo("Sorry, your place is already taken");
    $str=$str.$timearray[9];
}else{
    $str=$str."\n";
}

print($str);
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
