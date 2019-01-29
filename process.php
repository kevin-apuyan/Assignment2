
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

        //mysql credentials
        $mysql_host = 'localhost';
        $mysql_username = 'root';
        $mysql_password = 'phpmyadmin';
        $mysql_database = 'phpmyadmin';

        $u_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
        $u_email = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
        $u_text = filter_var($_POST["user_text"], FILTER_SANITIZE_STRING);

        if (empty($u_name)){
                die("Please enter your name");
        }
        if (empty($u_email) || !filter_var($u_email, FILTER_VALIDATE_EMAIL)){
                die("Please enter valid email address");
        }

        if (empty($u_text)){
                die("Please enter text");
        }

        //Open a new connection to the MySQL server
        //see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

        //Output any connection error
        if ($mysqli->connect_error) {
                die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }

        $statement = $mysqli->prepare("INSERT INTO users_data (user_name, user_email, user_message) VALUES(?, ?, ?)"); //prepare sql insert query
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('sss', $u_name, $u_email, $u_text); //bind values and execute insert query

        if($statement->execute()){
                print "Hello " . $u_name . "!, your message has been saved!";
        }else{
                print $mysqli->error; //show mysql error if any
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div> 
	
	<a href="welcome.php" class="btn btn-success">Go back</a>
</body>
</html>















