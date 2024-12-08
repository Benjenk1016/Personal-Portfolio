<!--move inital login screen to here
	then use keep the submit the same to call the php
	use the cmmodule.php to create connection and call dynamic functions
-->

<?php
function create(){
	echo '<div class="w3-half w3-blue-grey w3-container" id="test" style="height:700px">
  <div class="w3-padding-64 w3-center" id="test">
    <h1 class="test" id="ccmm">Content Maneger Module</h1>
    <div class="w3-left-align w3-padding-large" id="test">
      <a href="index.php" class="remove">Back To Home</a>
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
</div>';
}

//load the edit page
function editpage(){
include_once("./includes/dynamic.inc.php");
$database = "a09_Jenkins";
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$col = generateDefaColor(2,$conn);
echo $col;

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
	form.action = "process.php";
	form.method = "GET";
	let color = document.createElement("input");
	form.appendChild(color);
	background.id = "back";
	color.type = "color";
	color.id = "colorpicker";
	color.name = "colorpicker";
	color.onchange = "clickColor(0, -1, -1, 5)";
	color.value = "htmlspecialchars($col)";
	color.style = "width:100px";
  	let para1 = document.createElement("textarea");
	form.appendChild(para1);
	background.id = "back";
	para1.type = "color";
	para1.id = "para1";
	para1.name = "para1";
	para1.rows = "5";
  para1.cols = "50";
  let submit = document.createElement("input");
  form.appendChild(submit);
  submit.type = "submit";
  submit.value = "submit";
	</script>';

}
?>
<?php
include_once("./includes/dynamic.inc.php");
$database = "a09_Jenkins";
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
 
//get the input data and store color
$new = $_GET["colorpicker"];
storeAboutMeColor($new, $conn);
//get the text area input and store
$para = $_GET["para1"];
storeAboutMeParagraphs($para, $conn);
?>


<!-- 

	create receipt page

-->
