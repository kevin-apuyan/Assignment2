<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 20px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Looking to rent your room??.</h1>
    </div>
    <p>


        <a href="logout.php" class="btn btn-danger">Log off</a>
                <a href="ads.php" class="btn btn-success">Post a new ad for your room</a>
    </p>

        <?php
                $mysql_host = 'localhost';
        $mysql_username = 'root';
        $mysql_password = 'phpmyadmin';
        $mysql_database = 'phpmyadmin';

                $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
                $sql = "SELECT * FROM users_data";
                $result = $mysqli->query($sql);


               echo "<table border='1'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Add Description</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['user_name'] . "</td>";
echo "<td>" . $row['user_email'] . "</td>";
echo "<td>" . $row['user_message'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>
</body>
</html>



