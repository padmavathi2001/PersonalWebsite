
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<style>
 button
{
    color:blue;
    font-size:15px;
    border:none;
   border-radius:20px;
  background-color:coral;
  height:40px;
  width:80px;
}
button:hover
{
	background:  linear-gradient(white,blue);
  border-radius:20px;
  border:none;
  color: black;
}



h2
  {
    color:red;
    font-weight:bold;
    text-align:center;
    justify-content:center;
  }

  h3
  {
    color:white;
    padding-left:50px;
    font-weight:bold;
    text-align:center;
    justify-content:center;
  }
  
		body {
    
			display: flex;
			flex-wrap: wrap;
   padding-left:50px;
   padding-bottom:80px;
  background-image:url('p4.jpg');
  background-repeat: no-repeat;
  background-size: cover;
		}
		.alb {
     
			width: 300px;
			height: 300px;
			padding:25px;
		}
   
		.alb img {
     
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}

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

	</style>
</head>
<body>
    <br><br>

     <?php 


	 

include 'db_conn.php';
include 'head.php';

if(!isset($_SESSION['name']))
{
    header('location:index.php');
}
else
{
    $name =  $_SESSION['name'];
$query = "SELECT * FROM $name ORDER by id DESC";
          $res = mysqli_query($conn,  $query);

          if (mysqli_num_rows($res) > 0) {
        echo "<br>";
          	while ($row = mysqli_fetch_assoc($res)) {  ?>
             

             <div class="alb">
             	<img height="300px" width="300px" src="save/<?=$row['image_url']?>">

                 <button><a href="delete.php?userid=<?php echo $row['id']; ?>">Delete</a></button>


             </div>

          
          		
    <?php } } 

else
  {
    echo "<h2><br>No images left in your gallery<br></h2>";
    echo "<br>";
    echo "</br>";
    echo "<h3><br><br>Click on Upload image to add images</h3>";
   
  }
  



}?>
			  
</body>
</html>
