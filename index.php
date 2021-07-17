<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}

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
  font-weight:bold;
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
  background: linear-gradient(white,pink,green);
    }
    
    input[type=submit]
{
    color:black;
    font-size:20px;
    font-weight:bold;
    border:none;
   border-radius:20px;
  background-color:pink;
  height:40px;
  width:80px;
}
input[type=submit]:hover
{
	background:  linear-gradient(white,yellow);
  border-radius:20px;
  border:none;
  color: black;
  cursor:pointer;
}

input[type=reset]
{
    color:black;
    font-weight:bold;
    font-size:20px;
    border:none;
   border-radius:20px;
  background-color:pink;
  height:40px;
  width:80px;
}



input[type=reset]:hover
{
	background:  linear-gradient(white,yellow);
  border-radius:20px;
  border:none;
  color: black;
  cursor:pointer;
}

    html {
  height: 100%;
}
button{
        width:80px;
        height:50px;
        font-size:20px;
        border-radius: 10px;
        background-color: rgb(19, 211, 19);
        
    }button:hover{
        background-color: rgb(18, 166, 185);
        cursor: pointer;
        font-weight:bold;
        border-radius: 10px;
        border-color: blueviolet;
    }
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background:green;
   color: white;
   text-align: center;
   font-size:20px;
}


	</style>




<?php 

include "db_conn.php";
if(isset($_SESSION['name']))
{
 
echo ("<script LANGUAGE='JavaScript'>
window. alert('Logout to view Home page');
window. location. href='view.php';
</script>");
    
}

$e1=null;
$e2=null;
$e3=null;
$e4=null;
$e5=null;
$e6=null;

if (isset($_POST['submit'])){



	$errors = array();
	$uname=$_POST['uname'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$pass1=$_POST['pass1'];
	$date=$_POST['date'];


if($uname==null)
{
  $e1="User name required";
  array_push($errors,"name");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $e2 = "Invalid email format";
  array_push($errors,"email");
}
if($pass==null)
{
  $e3="Password required";
  array_push($errors,"pass");
}
if($pass1==null)
{
  $e4="Retype the password here";
  array_push($errors,"pass1");
}
if($date==null)
{
  $e5="Choose your Date of birth";
  array_push($errors,"date");
}
if($pass!=$pass1){
    $e4="Not matched";
    array_push($errors,"pass1");
  }

if($uname!=0&&$email!=0)

$user_check = "SELECT * from newuser WHERE name='$uname' or email = '$email' LIMIT 1";

$results = mysqli_query($conn,$user_check);
$user = mysqli_fetch_assoc($results);

if($user)
{
if($user['name'] === $uname)
{
    array_push($errors,"exists");
    echo '<script>alert("Username already taken")</script>';
$e1="Username already taken";
}
if($user['email'] === $email)
{
    array_push($errors,"mailexists");
    echo '<script>alert("Email already in use")</script>';
    $e2="Email already in use";
}
}

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'save/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				
if(count($errors) == 0){


	$pass=md5($pass1);
// Insert into Database
$query="INSERT into newuser(name,email,password,bdate,image) VALUES ('$uname','$email','$pass','$date','$new_img_name ')";

			$data =	mysqli_query($conn, $query);

      if($data)
      {
        echo '<script>alert("Successfully Registered")</script>';
      }
}else{
  echo '<script>alert("Fill all the details :(")</script>';
     }
  
			}
      else{
        echo '<script>alert("Profile photo must be jpg,jpeg or png type")</script>';
      }
        
		}
  
	}
  else{
    echo '<script>alert("Dont accept this large image")</script>';
  }
    

}

?>
</head>
<body>
<div class="navbar">

        <a href="index.php">Home</a>
        <a href="login.php" >Login</a>
        <a href="index.php" >SignUp</a>
        
      </div>


    <div class="a">
	
     <form action=""
           method="POST"
           enctype="multipart/form-data">



		   <div class="login-box">
			   
   <table cellspacing = "2" cellpadding = "2" border = "1">

   <tr>
	
		   <td align = "right">Name</td>
			  <td><input type = "text" name = "uname" />
			   <div class="e">*<?php echo $e1; ?></div>
	  
   </td>
</tr>
  
<tr>
  
	   <td align = "right">Email Address</td>
		
	  <td> <input type="text" name="email">
	  <div class="e">*<?php echo $e2; ?></div>
		  
   </td>
</tr>

	  
<tr>
   <td align = "right"> Password</td>
	  
	  <td> <input type="password" name="pass" maxlength="10">
	  <div class="e">*<?php echo $e3; ?></div>
   </td>
</tr>
	  
<tr>



   <tr>
	
	   <td align = "right">Confirm Password</td>
		  <td><input type = "password" name = "pass1" />
		  <div class="e">*<?php echo $e4; ?></div>
  
</td>
</tr>

	 
<tr>
   <td align = "right"> Date of Birth</td>

   <td> <div class="form-inline">
		   <input type="date" name="date">
	   </div>
	   <div class="e">*<?php echo $e5; ?></div>
   </td>


<tr>
   
   <td align = "right">Profile Picture</td>
 
   <td> <div class="form-inline">
	   <input type="file"  name="my_image" required>
   </div>
   <div class="e">*<?php echo $e6; ?></div>
  </td>
</tr>

<tr>
   <td align = "right">      
	   <input type="submit" value="submit" name="submit">

  
</td>

<td><input type="reset" value="Reset">
</td>
</tr>

</table>

</div>
<br>


<div>Already a user? Login here:<button onclick="document.location='login.php'">Login</button></div>

</form>
<div>


<div class="footer">
  <p>Developed by Padmavathi</p>
</div>
</body>
</html>