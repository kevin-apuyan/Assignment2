<?php
// starts a session using the user's credentials 
session_start();

// checks if user is logged in, otherwise will be redirected to the login page 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 20px Calibri; }
        .wrapper{ width: 450px; padding: 50px; }
  </style>
</head>

<body>
<div class = "wrapper">
        <form method="post" action="process.php">

                Name : <input type="text" name="user_name" class = "form-control"  placeholder="Enter Your Name" /><br />
                Email : <input type="email" name="user_email" class= "form-control" placeholder="Enter Your Email" /><br />
                Enter room description : <textarea name="user_text" class="form-control" ></textarea><br />
                <input type="submit" value="Submit" />
        </form>
</div>
</body>
</html>

