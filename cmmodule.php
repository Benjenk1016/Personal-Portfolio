<!DOCTYPE html>
<html lang="en">
<head>
<title>Content Module Manager</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
textarea {
  resize: none;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<?php
// -=-=-=-=-=-=-=-=-=-=-=-=
// Include other php files
// -=-=-=-=-=-=-=-=-=-=-=-=
include("./includes/define.inc.php");
include("./includes/dynamic.inc.php");
include("process.php");
create();

$re = "/[a-z]+/";
$br = "<br />"; // define a global variable
// -=-=-=-=-=-=-=-=-=-=-=-=
// Connect to the database
// -=-=-=-=-=-=-=-=-=-=-=-=
//

//required info for accessing database
$database = "a09_Jenkins";
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//validate user input
if(preg_match($re , $_GET["userName"]) && preg_match($re , $_GET["passWord"])) {
   //attemp login
 loginCredentials(1,1,$conn);
 //once complete, move to getting current values that are going to be modded

//load the edit page
 editpage();




 
  

  
}
//if input is not valid, tell user  
else{
  echo "invalid input";
}
//close the connection to database
$conn->close();

?>
</div>
</body>
</html>