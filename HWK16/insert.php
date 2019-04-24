<!DOCTYPE html>
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

// Add data to a table in the database
$id = $_POST["id"];
$last = $_POST["last_name"];
$first = $_POST["first_name"];
$major = $_POST["major"];
$gpa = $_POST["gpa"];

$table = "students";

if ($id!='') {
    $stmt = mysqli_prepare ($connect, "INSERT INTO $table VALUES (?, ?, ?, ? , ?)");
    mysqli_stmt_bind_param ($stmt, 'ssssd', $id, $last, $first, $major, $gpa);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
    print $id.' inserted.';
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Insert</title>
    </head>
    <body>
        <h1>Insert Student Record</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            ID: <input type="text" name="id" required><br />
            Last Name: <input type="text" name="last_name" required><br />
            First Name: <input type="text" name="first_name" required><br />
            Major: <input type="text" name="major" required><br />
            GPA: <input type="text" name="gpa" required><br />
            <input type="submit" name="submit" value="Insert" />
            <!-- <input type="button" onclick="location.href = 'database.php';" value="Go Back"/> -->
        </form>
        <button type="button" onclick="location.href = 'database.php';" name="goBack">Go back to Menu</button>
        <button type="button" onclick="location.href = 'index.php';" name="Logout">Logout</button>

    </body>
</html>
