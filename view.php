
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
<style>

.div{
    color:white;
    text-align:center;
    padding-right:80px;
    padding-top:30px;

}.div,a{
    color:white;
    text-decoration:none;
    font-weight: bold;
    font-size: 30px;
}
 .e
    {
        color:red;
    }
  
   
 body
 {
  
  background-image:url('p4.jpg');
  background-repeat: no-repeat;
  background-size: cover;
 }
.e{
			display: flex;
			background-repeat:none;
			justify-content: center;
			align-items: center;
			height:30px;
            width: 100%;
			min-height: 100vh;
		}
	
		img{
			border-radius:150px;
		}

.b
{
   
    background-color:blueviolet;
    text-align: center;
    color:white;
    font-weight: bold;
    font-size: 26px;
    
   
}


		
	</style>
</head>
<body>
  


<div class="div">

<a href="ins.php">Instructions</a>

</div>


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

          $query = "SELECT image,name FROM newuser WHERE name='$name'";
          $res = mysqli_query($conn,  $query);

          if (mysqli_num_rows($res) > 0) {
          	while ($row = mysqli_fetch_assoc($res)) {  ?>
             
<div class="e">
             <div class="alb">
             	<img height="300px" width="300px" src="save/<?=$row['image']?>">
				 <h2 class="b">Welcome <?=$row['name']?> Have a nice day :)</h2>
             </div>
             </div>
          		
    <?php } } }?>


</body>
</html>
