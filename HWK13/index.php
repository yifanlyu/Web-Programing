<?php

$timesheet1=file("signup.txt");

$timearray = array("eight"=>$timesheet1[0],
"nine"=>$timesheet1[1],
"ten"=>$timesheet1[2],
"eleven"=>$timesheet1[3],
"tweleve"=>$timesheet1[4],
"one"=>$timesheet1[5],
"two"=>$timesheet1[6],
"three"=>$timesheet1[7],
"four"=>$timesheet1[8],
"five"=>$timesheet1[9],
);


function status($k){
    global $timearray;
    if(trim($timearray[$k])!=''){
        return $timearray[$k];
    }else{
        return "<input type='text' name=".$k.">";
    }
}


?>

<html>
<head>
<title> Sign-Up Sheet </title>
</head>
<body>
<h3> Sign-Up Sheet </h3>
<form method = "post" action = "submit.php">
    <?php print($timearray) ?>
    <table align = "center" width = "50%" border = "2">
        <caption> Sign-Up Sheet </caption>
        <tr><th> Time </th><th> Name </th></tr>
        <tr><td> 8:00 am </td><td> <?php echo(status("eight")); ?> </td></tr>
        <tr><td> 9:00 am </td><td> <?php echo(status("nine")); ?> </td></tr>
        <tr><td> 10:00 am </td><td> <?php echo(status("ten")); ?> </td></tr>
        <tr><td> 11:00 am </td><td> <?php echo(status("eleven")); ?> </td></tr>
        <tr><td> 12:00 pm </td><td> <?php echo(status("tweleve")); ?> </td></tr>
        <tr><td> 1:00 pm </td><td> <?php echo(status("one")); ?> </td></tr>
        <tr><td> 2:00 pm </td><td> <?php echo(status("two")); ?> </td></tr>
        <tr><td> 3:00 pm </td><td> <?php echo(status("three")); ?> </td></tr>
        <tr><td> 4:00 pm </td><td> <?php echo(status("four")); ?> </td></tr>
        <tr><td> 5:00 pm </td><td> <?php echo(status("five")); ?> </td></tr>
    </table>
    <input type = "submit" value = "sumbit your timeslot" />
</form>
<p>
</p>
</form>
</body>
</html>
