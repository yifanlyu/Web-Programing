<?php
session_start();

if ($_SESSION['user'] == '') {
  $_SESSION['error'] = "You are logged out, please login again";
  header("location: index.php"); // Redirecting to first page
}


$id = $_POST["id"];

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

$table = "students";

$sql = "DELETE FROM students where id=$id";
$result = mysqli_query($connect, $sql);
if ($id != '') {
    print $id.' deleted.';
}

mysqli_close($connect);

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Delete</title>
    </head>
    <body>
        <h1>Delete Student Record</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            ID: <input type="text" name="id" required><br />

            <input type="submit" name="submit" value="Delete" />
            <!-- <input type="button" onclick="location.href = 'database.php';" value="Go Back"/> -->
        </form>
        <button type="button" onclick="location.href = 'database.php';" name="goBack">Go back to Menu</button>
        <button type="button" onclick="location.href = 'index.php';" name="Logout">Logout</button>

    </body>
</html>
