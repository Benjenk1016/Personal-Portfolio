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
      <a href="index.php" id="backToHome">Back To Home</a>
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

//validate user input
if(preg_match($re , $_GET["userName"]) && preg_match($re , $_GET["passWord"])) {
   //attemp login
 loginCredentials(1,1,$conn);
 //once complete, move to getting current values that are going to be modded


 $content = generateAboutMeParagraphs($conn);
 echo $content;
// get the first paragraph
echo '<script type="text/javascript">
  	let para1 = document.createElement("textarea");
	form.appendChild(para1);
	background.id = "back";
	para1.type = "color";
	para1.id = "colorpicker";
	para1.name = "colorpicker";
	para1.rows = "5";
  para1.cols = "50";
  //para1.value = "htmlspecialchars($content)";

	</script>';      


  
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