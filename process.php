<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>PHP Form Processor</title>
</head>
<body>
   <h1>Input from a Form</h1>
   <h2>Display GET Data</h2>

<?php
// You can use that termporarily to test your validation
// but in the final product this has to be changed

//print_r($_GET);
if (isset($_GET)) {
	if (count($_GET) == 0){
	    echo "<p><em>There are no GET variables</em></p>";
	} else {
	      foreach ($_GET as $key => $value){
	        echo "<strong>" . $key . "=</strong>" . $value . "</br>";
	      }
	}
}
?>

   <h2>Display POST Data</h2>

<?php
// if method is POST, and count() not zero...
//print_r($_POST);
if (isset($_POST)) {
	if (count($_POST) == 0){
	    echo "<p><em>There are no POST variables</em></p>";
	} else {
        // display the $_POST superglobal in human readable form
        // display all key-value pairs using foreach
	    foreach ($_POST as $key => $value){
	        echo "<strong>" . $key . "=</strong>" . $value . "</br>";
	    }
	}
}

?>

</body>
</html>