
<!DOCTYPE html>
<html>
<head>
	<title>Display</title>
	<style>

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
  background-image:url('p4.jpg');
  background-repeat: no-repeat;
  background-size: cover;
		}
		.alb {
     
			width: 300px;
			height: 300px;
			padding: 5px;
		}
   
		.alb img {
     
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}

	</style>
</head>
<body>

     <?php 
include 'db_conn.php';
include 'head.php';
if(!isset($_SESSION['name']))
{
    header('location:index.php');
}
else
{
	
	$name=$_SESSION['name']; 
$query = "SELECT * FROM $name ORDER by id DESC";
          $res = mysqli_query($conn,  $query);

          if (mysqli_num_rows($res) > 0) {
            echo "<br>";
            echo "</br>";
          	while ($row = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="e">

             <div class="alb">
             	<img height="300px" width="300px" src="save/<?=$row['image_url']?>">

             </div>

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
