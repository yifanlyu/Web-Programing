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

// Get data from a table in the database and print it out
$id = $_POST["id"];
$last = $_POST["last_name"];
$first = $_POST["first_name"];
$table = "students";

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['viewAll'])) {
    $sql = "SELECT * FROM students ORDER BY last_name, first_name";
    $result1 = mysqli_query($connect, $sql);

    echo "<table>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Firstname</th>";
    echo "<th>Lastname</th> ";
    echo "<th>Major</th> ";
    echo "<th>GPA</th> ";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result1)) {
      echo "<tr>";
      echo "<td>".$row["id"]."</td>";
      echo "<td>".$row["first_name"]."</td>";
      echo "<td>".$row["last_name"]."</td>";
      echo "<td>".$row["major"]."</td>";
      echo "<td>".$row["gpa"]."</td>";
      echo "</tr>";
    }

    echo "</table>";
}
else {
    if ($id!="") {
        $sql = "SELECT * FROM students WHERE id=$id";
        $result = mysqli_query($connect, $sql);
    }
    else {
        if ($last!="" && $first=="") {
            $sql = "SELECT * FROM students WHERE last_name='$last'";
            $result = mysqli_query($connect, $sql);
        }
        else if ($first!="" && $last=="") {
            $sql = "SELECT * FROM students WHERE first_name='$first'";
            $result = mysqli_query($connect, $sql);
        }
        else if ($first!="" && $last!="") {
            $sql = "SELECT * FROM students WHERE first_name='$first' AND last_name='$last'";
            $result = mysqli_query($connect, $sql);
        }
    }
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<br>";
      echo "ID = ".$row["id"]."<br>"."Last Name = ".$row["last_name"]."<br>"."First Name = ".$row["first_name"]."<br>"."Major = ".$row["major"]."<br>"."GPA = ".$row["gpa"];
      echo "<br>";
    }
}

// $result->free();

mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>View</title>
    </head>
    <body>
        <h1>View Student Record</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            ID: <input type="text" name="id"><br />
            Last Name: <input type="text" name="last_name"><br />
            First Name: <input type="text" name="first_name"><br />
            <input type="submit" name="submit" value="View" />
            <input type="submit" name="viewAll" value="View All Student Records"/>
        </form>
        <button type="button" onclick="location.href = 'database.php';" name="goBack">Go back to Menu</button>
        <button type="button" onclick="location.href = 'index.php';" name="Logout">Logout</button>

    </body>
</html>
