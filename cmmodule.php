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
include("./includes/db.inc.php");
include("process.php");
create();

$re = "/[a-z]+/";
$br = "<br />"; // define a global variable
// -=-=-=-=-=-=-=-=-=-=-=-=
// Connect to the database
// -=-=-=-=-=-=-=-=-=-=-=-=
//

$conn = getDbConnection();

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["userName"]) && isset($_GET["passWord"])) {
  //validate user input
  if (preg_match($re, $_GET["userName"]) && preg_match($re, $_GET["passWord"])) {
    //attemp login
    loginCredentials(1,1,$conn);

    //load the edit page
    editpage();
  }
  //if input is not valid, tell user
  else {
    echo "invalid input";
  }
}
//close the connection to database
$conn->close();

?>
<?php
$liveReloadUrl = getenv("LIVE_RELOAD_URL");

if ($liveReloadUrl !== false && $liveReloadUrl !== "") {
  echo '<script async src="' . htmlspecialchars($liveReloadUrl, ENT_QUOTES, 'UTF-8') . '"></script>';
}
?>
</div>
</body>
</html>