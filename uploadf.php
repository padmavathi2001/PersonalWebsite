<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>

<style>



body {margin:0;}

.navbar {
  overflow: hidden;
  top:0;
  background-color:coral;
  position:fixed;
  height:60px;
  width: 100%;
}


.navbar a {
    margin-left: 20px;
  float: left;
  display: block;
  color: #f2f2f2;
  padding: 10px 16px;
  text-decoration: none;
  font-size: 21px;
}

.navbar a:hover {
  background: pink;
  border-radius:20px;
  border:none;
  color: black;
}



    .e
    {
        color:red;
    }
    body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
    }
    
    input[type=submit]
{
    color:blue;
    font-size:20px;
    border:none;
   border-radius:20px;
  background-color:pink;
  height:40px;
  width:80px;
}

    html {
  height: 100%;
}


.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}



.login-box input[type=submit]:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box input[type=submit] span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box input[type=submit] span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box input[type=submit] span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box input[type=submit] span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

    
    </style>



<?php 



include "db_conn.php";
include 'head.php';

if(!isset($_SESSION['name'])&&(!isset($_SESSION['fname'])))
{
    header('location:index.php');
}

else

{

    

if (isset($_POST['btn'])){


    $name2 = $_SESSION['fname'];

	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$error = $_FILES['file']['error'];

	if ($error === 0) {
		if ($file_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
			$file_ex_lc = strtolower($file_ex);

			$allowed_exs = array('pdf', 'txt', 'doc', 'docx','gif','xlsx'); 

			if (in_array($file_ex_lc, $allowed_exs)) {
				$new_file_name = uniqid("DOC-", true).'.'.$file_ex_lc;
				$file_upload_path = 'uploads/'.$new_file_name;
				move_uploaded_file($tmp_name, $file_upload_path);


$query="INSERT into $name2(id,name,file_url) VALUES ('','$file_name','$new_file_name')";

			$data=	mysqli_query($conn, $query);
if($data)
{
    echo '<script>alert("Uploaded successfully")</script>';
}
	}
  else
{
  echo '<script>alert("Only select pdf,txt,doc,docx,gif files")</script>';

}		
		}
	}

}

}
?>

</head>
<body>
    
<form action="" method="POST" enctype="multipart/form-data">


<div class="login-box">
<div class="user-box">
 <label>Select File(pdf,txt,doc,docx,gif):</label><br><br>
    <input type="file" name="file" required>
</div>
    <input type="submit" name="btn" value="Submit">
</form>


</body>
</html>