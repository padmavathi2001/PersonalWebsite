
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.b1{
   
    text-align: left;
    color:white;
    font-weight: bold;
    font-size: 26px;
   
}
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: pink;
  
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

@media screen and (min-height: 300px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="ins.php">Instructions</a>
  <a href="#">Gallery</a>
  <ul>
  <li><a href="gal.php">Upload photo</a></li>
  <li><a href="display.php">Display Gallery</a></li>
  <li><a href="edit.php">Edit Gallery</a></li>

  
  </ul>
  <a href="#">Store Files</a>
  <ul>
  <li><a href="uploadf.php">Upload file</a></li>
  <li><a href="displayf.php">Download File</a></li>
  <li><a href="displayf.php">Delete File</a></li>
  
  </ul>
  <a href="#">Store Tasks</a>
  <ul>
  <li><a href="task.php">Store new task</a></li>
  <li><a href="edittask.php">Edit Tasks</a></li>
  </ul>
  <a href="view.php">View Profile</a>
  <a href="reset.php">Change Password</a>

  <a href="logout.php">Logout</a>

  <a href="contact.php">Contact Us</a>
</div>

<div class="b1" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
</body>
</html> 



<?php




?>
