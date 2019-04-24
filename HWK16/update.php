<?php
session_start();

if ($_SESSION['user'] == '') {
  $_SESSION['error'] = "You are logged out, please login again";
  header("location: index.php"); // Redirecting to first page
}



// Connect to the MySQL database
$host = "localhost";
$user = "cs329e_mitra_lyf007";
$pwd = "bridge3filth-Affair";
$dbs = "cs329e_mitra_lyf007";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])) {
    $id = $_POST["id"];
    $last = $_POST["last_name"];
    $first = $_POST["first_name"];
    $major = $_POST["major"];
    $gpa = $_POST["gpa"];

    if ($id!="" && $last=="" && $first=="" && $major=="" && $gpa=="") {
        print "You must enter ID and at least one other field.";
    }

    $table = "students";

    if ($last!="") {
        $sql = "UPDATE students SET last_name='$last' WHERE id=$id";
        $result = mysqli_query($connect, $sql);
        print 'Last name updated ';
        echo "<br>";
    }

    if ($first!="") {
        $sql1 = "UPDATE students SET first_name='$first' WHERE id=$id";
        $result = mysqli_query($connect, $sql1);
        print 'First name updated ';
        echo "<br>";

    }


    if ($gpa!="") {
        $sql3 = "UPDATE students SET gpa=$gpa WHERE id=$id";
        $result = mysqli_query($connect, $sql3);
        print 'GPA updated ';
        echo "<br>";

    }

    if ($major!="") {
        $sql2 = "UPDATE students SET major='$major' WHERE id=$id";
        $result = mysqli_query($connect, $sql2);
        print 'Major updated ';
        echo "<br>";

    }

    mysqli_close($connect);
}



?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Update</title>
    </head>
    <body>
        <h1>Update Student Record</h1>
        <form method="post" name="Form" onsubmit="validateForm()" action="<?php echo $_SERVER["PHP_SELF"];?>">
            ID: <input type="text" name="id" required><br />
            Last Name: <input type="text" name="last_name" ><br />
            First Name: <input type="text" name="first_name" ><br />
            Major: <input type="text" name="major" ><br />
            GPA: <input type="text" name="gpa" ><br />
            <input type="submit" name="submit" value="Update" />
        </form>
        <button type="button" onclick="location.href = 'database.php';" name="goBack">Go back to Menu</button>
        <button type="button" onclick="location.href = 'index.php';" name="Logout">Logout</button>

        <div id="error">

        </div>

        <script>
            function validateForm() {
                // var id=document.forms["Form"]["id"].value;
                var last_name=document.forms["Form"]["last_name"].value;
                var first_name=document.forms["Form"]["first_name"].value;
                var major=document.forms["Form"]["major"].value;
                var gpa=document.forms["Form"]["gpa"].value;
            }
        </script>

    </body>
</html>
