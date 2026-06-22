<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/master_style_sheet.css">
<script>
//validate the contact me form
function validateForm(){
    let re = /[a-z]+/;
    let edu = /(\w*(.\w?)(.\w*.\w*)?@bgsu.edu)$|^(\w*.\w*@bgnet.bgsu.edu)$/;
    let mail = document.getElementById("1email").value;
   if(!edu.test(mail)){
    return false;
   }
   let user = document.getElementById("name").value;
   if (!re.test(user)) {
    return false;
   }
   let message = document.getElementById("message").value;
   if (!re.test(message)) {
    return false;
   }
}
function resumeGen(){
//use XML request 
let xhr = new XMLHttpRequest();
xhr.addEventListener("load", function () {
  let ff = document.getElementById("st");
  if (this.status === 200) {
let json = this.response;
ff.innerHTML = "<td>" + json.rYearRange +"</td>";
  }
}); 
xhr.responseype = "json";
xhr.open('GET', 'resume.json');
xhr.send();


}


  </script>
</head>
<?php
include("./includes/define.inc.php");
include("./includes/dynamic.inc.php");
include("./includes/db.inc.php");

$conn = getDbConnection();
?>
<body>

<div class="page-shell">

<div class="w3-bar w3-black">
  <span class="w3-bar-item">My Menu</span>
  <a href="#" class="w3-bar-item w3-button w3-hover-blue-grey">Home</a>
  <a href="#work" class="w3-bar-item w3-button w3-hover-teal">My Favorite Places</a>
  <a href="#work" class="w3-bar-item w3-button w3-hover-dark-grey">Resume</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hover-brown">Contact</a>
  <a href="cmmodule.php" class="w3-bar-item w3-button w3-hover-brown">Login</a>
</div>

<!-- First Grid: About -->
<div class="w3-row">
  <div class="w3-blue-grey w3-container" style="height:700px" id="about">
    <div class="w3-padding-64">
      <h1>About Me</h1>
      <div class="w3-row w3-padding-large">
        <div class="w3-third w3-center">
          <h3>Benjamin Jenkins</h3>
          <img src="images\headshot.jpg" class="w3-margin w3-circle" alt="headshot" style="width:60%;max-width:260px;">
        </div>
        <div class="w3-twothird w3-left-align">
          <!-- make about me paragraphs dynamically generate-->
          <p>I am a Computer Science student at Bowling Green State University with a passion for building practical, real-world software. My projects range from full-stack web applications to an agentic AI-powered ETL pipeline, reflecting my interest in both traditional development and emerging technologies. I work across a wide range of technologies including Python, JavaScript, PHP, SQL, Docker, and FastAPI, and I am always expanding that list — most of what I know I learned by picking up new tools out of curiosity and building something with them.</p>
          <p>I also bring real-world experience in customer-facing technology roles where I diagnosed hardware and software issues, recommended solutions based on individual needs, and learned to communicate technical concepts clearly to non-technical people. That combination of technical ability, strong work ethic, and clear communication is something I carry into everything I work on. I am currently seeking internship or entry-level opportunities in software development or technology support where I can contribute and keep growing.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Second Grid: Work & Resume -->

<!-- make the projects and resume sections dynamically generate from the database-->
<div class="w3-row glass-band">
  <div class="w3-half w3-light-grey w3-center" style="min-height:800px; width:50%;" id="work">
    <div class="w3-padding-64" style="height:200px;">
      <h2>Projects</h2>
      <p>Some of my latest projects.</p>
    </div>
    <div class="w3-row w3-center" style="padding:0 20px;">
      <div>
        <img src="images\AGENTIC_PIC.png" style="max-width:90%; width:100%; height:auto; margin:20px auto; display:block; border-radius:8px; margin-top:0; padding-top:0;">
      </div>
    </div>

    <div class="w3-row w3-center w3-hide-small" style="padding:0 20px;">
      <div>
        <img src="images\workout_pic.png" style="max-width:90%; width:100%; height:auto; margin:20px auto; display:block; border-radius:8px;">
      </div>
    </div>
  </div>
  <div class="w3-half w3-indigo w3-container" style="min-height:800px; width:50%;">
    <div class="w3-padding-64 w3-center">
      <h2>Education and Work</h2>
      <!-- make this come from the database-->
       <!--update to be work experience and education sections-->
      <div class="w3-container w3-responsive">

        <table class="w3-table">
          <tr>
            <th>Year</th>
            <th>Title</th>
            <th>Where</th>
          </tr>
          <tr class="w3-white" id="st">
<script>
//function to genterate resume content
resumeGen;
</script>

            <td>2024 - 2026</td>
            <td>Online Grocery Associate</td>
            <td>Walmart Chardon, Ohio</td>
          </tr>
          <tr id="sec">
            <td>2023 - 2024</td>
            <td>Technology Associate</td>
            <td>Staples Mentor, Ohio</td>
          </tr>
          <tr class="w3-white" id="third">
            <td>2022-2026</td>
            <td>B.S. in Computer Science Student</td>
            <td>Bowling Green State University, Ohio</td>
            </tr>
            <tr  id="fourth">
              <td>2026-present</td>
              <td>B.S.I.T. in Information Technology Specializing in Web Development</td>
              <td>Kent State University Trumbull, Ohio</td>
              </tr>

        </table>
      </div>
    </div>
  </div>
</div>

<!-- Third Grid: Swing By & Contact -->
<div class="w3-row" id="contact">
  <div class="w3-half w3-dark-grey w3-container w3-center" style="height:700px">
    <div class="w3-padding-64">
      <h1>Get In Touch</h1>
    </div>
    <div class="w3-padding-64">
      <p>Willoughby, Ohio</p>
      <p>Phone : +1 440 - 749 - 8126</p>
      <p>Email : bjenkins03@outlook.com</p>
    </div>
  </div>
  <div class="w3-half w3-teal w3-container" style="height:700px">
    <div class="w3-padding-64 w3-padding-large">
      <h1>Contact</h1>
      <p class="w3-opacity">GET IN TOUCH (doesnt actually work, more a proof of concept)</p>
      <!--validate with JS-->
      <form class="w3-container w3-card w3-padding-32 w3-white" action="/action_page.php" target="_blank" onsubmit="return validateForm()">
        <div class="w3-section">
          <label>Name</label>
          <input class="w3-input" style="width:100%;" type="text" required name="Name" id="name">
        </div>
        <div class="w3-section">
          <label>Email</label>
          <input class="w3-input" style="width:100%;" type="text" required name="Email" id="1email"> 
        </div>
        <div class="w3-section">
          <label>Message</label>
          <input class="w3-input" style="width:100%;" type="text" required name="Message" id="message">
        </div>
        <button type="submit" class="w3-button w3-teal w3-right">Send</button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<?php
include("./includes/footer.inc.php");
?>

</div>

</body>
</html>