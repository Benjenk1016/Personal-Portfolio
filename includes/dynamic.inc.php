<?php

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    generateAboutMeParagraphs
// Description: read about me paragraphs from the aboutme table.
// 				Each paragraph is styled with <p></p> elements.
// Parameters:	$connection - the DB connection
// Returns:		Returns HTML via return statement.
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function generateMainContent($connection){
	// TODO
    return $content;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    generateAboutMeParagraphs
// Description: read about me paragraphs from the aboutme table.
// 				Each paragraph is styled with <p></p> elements.
// Parameters:	$connection - the DB connection
// Returns:		Returns HTML via return statement.
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function generateAboutMeParagraphs($connection){
$sqlPar = "SELECT aPara1 FROM aboutme";
$result = $connection->query($sqlPar);
$rowPar = $result->fetch_assoc();
$content = $rowPar["aPara1"];

    return $content;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    generateColor
// Description: generate div with appropriate color
// Parameters:  $blockName - name of the block for which we
//				are generating the HTML with custom color
//				$connection - the DB connection
// Returns:		HTML generated string
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function generateColor($blockName, $connection){


	
}

function generateDefaColor($blockName, $connection){
$sql1 = "SELECT cHexColor FROM colors WHERE cBlockNo=$blockName";
$result1 = $connection->query($sql1);
$row1 = $result1->fetch_assoc();
$color = $row1["cHexColor"];
return $color;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    storeAboutMeColor
// Description: store About Me background color into colors table
// Parameters:  $hexColor - user selected hex color
//				$connection - the DB connection
// Returns:		N/A
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function storeAboutMeColor($hexColor, $connection){
	// TODO
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    storeAboutMeParagraphs
// Description: store paragarphs into the aboutme table
// Parameters:  $ary - $_POST array
//				$connection - the DB connection
// Returns:		Returns HTML via return statement.
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function storeAboutMeParagraphs($ary, $connection){

	
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    generateResumeItem
// Description: read resume records from the resume table.
// 				Each resume record contains three values (year range,
//				title, and where).
// Parameters:	$id - id of the resume line (e.g., 1, 2, 3, etc. up to 8)
// 				$range - year range item (e.g., 2012-2015)
//              $title - the title of the resume item
//				$where - the where item
//				$connection - the DB connection
//				Parameters with & are passed by reference and will
//				be assigned a value by this function.
// Returns:		Returns values via the reference parameters
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function generateResumeItem($id, &$range, &$title, &$where, $connection){
	// TODO
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    storeResumeItem
// Description: commit the resume lines (items) provided by
//				the use, i.e., each line of resume contains
//				three values (year range, title, where). These
//				three values are fields in the resume table for
//              each line of the resume.
// Parameters:	$ary - this is the $_POST superglobal array
//				$connection - the DB connection
// Returns:		N/A
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function storeResumeItem($ary, $connection){
   // TODO
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Function:    loginCredentials
// Description: Check if user provided username/password
//				exists in the users table. Password will
//				be stored in plain text in the table. Not
// 				a good practice, but for simplicity we will
//				allow it. Usually, it would be hashed and
//				the hash code would be stored.
// Parameters:	$user - uername provided
//				$pass - password provided
//				$connection - the DB connection
// Returns:		true if user/pass found in DB, false otherwise
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
function loginCredentials($user, $pass, $connection){
    $isOK = false;
	$re = "/[a-z]+/";

//get data from "users" table
$sql = "SELECT uName, uPass FROM users";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

	//make sure input is correct
	if (($_GET["userName"] == $row["uName"]) && ($_GET["passWord"] == $row["uPass"])){
	//set isOK to true
	$isOK = true;

	//remove "login" widgets and labels
	echo '<script type="text/javascript">
	let remoce = document.querySelector("form");
	remoce.remove();
	</script>';

	 //get the current color value
	$color = generateDefaColor(2,$connection);
	//add the new elements
	echo '<script type="text/javascript">
	let head = document.getElementById("ccmm");
	let edit = document.createElement("h2");
	head.appendChild(edit);
	edit.textContent = "Edit About Me Settings";
	let background = document.createElement("p");
	background.textContent = "Background Color";
	edit.appendChild(background);
	let form = document.createElement("form");
	background.appendChild(form);
	form.action = "cmmodule.php";
	form.method = "GET";
	let color = document.createElement("input");
	form.appendChild(color);
	background.id = "back";
	color.type = "color";
	color.id = "colorpicker";
	color.name = "colorpicker";
	color.onchange = "clickColor(0, -1, -1, 5)";
	color.value = "htmlspecialchars($color)";
	color.style = "width:100px";
	</script>'; 
	
	//add submit button to form
}

return $isOK;

}

?>