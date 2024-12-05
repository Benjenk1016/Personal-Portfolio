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
<div class="w3-half w3-blue-grey w3-container" style="height:700px">
  <div class="w3-padding-64 w3-center">
    <h1 id="ccmm">Content Maneger Module</h1>
    <div class="w3-left-align w3-padding-large">
      <a href="index.php">Back To Home</a>
      <span id="error"></span><br>
      <form action="cmmodule.php" method="GET">
        <label for="username" class="removes">UserName</label>
        <br>
        <input type="text" name="userName" id="username" id="removed">
        <br>
        <label for="password" class="removes">Password</label >
        <br>
        <input type="password" name="passWord" id="password" class="removes">
        <br>
        <input type="submit" value="Login" id="submit" class="removes">
      </form>
    </div>
  </div>
</div>
<?php
// -=-=-=-=-=-=-=-=-=-=-=-=
// Include other php files
// -=-=-=-=-=-=-=-=-=-=-=-=
include("./includes/define.inc.php");
include("./includes/dynamic.inc.php");
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
echo "<p>Connected successfully</p>";

//get data from "users" table
$sql = "SELECT uName, uPass FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//make sure input is validated
if(preg_match($re , $_GET["userName"]) && preg_match($re , $_GET["passWord"])) {

//check to make sure the username and password are in table
  if ( !($_GET["userName"] == $row["uName"]) && !($_GET["passWord"] == $row["uPass"])){
    echo "<p>incorrect login info</p>";
  }
  else{
    echo $_GET["userName"]. " ". $_GET["passWord"] . " is correct";

//run JS within php to edit the current page to change to the editing of the color and text portion
//remove "login" widgets and labels
    echo '<script type="text/javascript">
     let remoce = document.querySelector("form");
     remoce.remove(); 
  </script>';

//change to the edit about me view
  echo '
  <h2> Edit About Me Settings</h2>
  <p>Background Color</p>
  <input type="color" id="html5colorpicker" onchange="clickColor(0, -1, -1, 5)" value="#ff0000" style="width:100px;">
  ';
  }
  //get value from color picker. put into database
$conn->close();
}

else{
  echo "enter valid input";
}

?>
</div>
</body>
</html>