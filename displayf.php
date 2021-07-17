
<!DOCTYPE html>
<html>
<head>
	<title>Display</title>
	<style>

body {
			display: flex;
			flex-wrap: wrap;
      background-image:url('p4.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  
			
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

		.alb {
			width: 200px;
			height: 200px;
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


button
{
    color:blue;
    font-size:15px;
    border:none;
   border-radius:20px;
  background-color:coral;
  height:40px;
  width:80px;
  color:white;
}
button:hover
{
	background:  linear-gradient(white,blue);
  border-radius:20px;
  border:none;
  color: white;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid white;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  color: white;
}

tr:nth-child(odd) {
  color: white;
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

 $name2 = $_SESSION['fname'];
$query = "SELECT * FROM $name2 ORDER by id DESC";
          $res = mysqli_query($conn,  $query);
?>

<br>
          <table>
          <tr>
              <th>File Name</th>
              <th>Download</th>
              <th>Delete</th>
          </tr>

<?php

          if (mysqli_num_rows($res) > 0) {
      ?>        

  <?php
          	while ($row = mysqli_fetch_assoc($res)) {  ?>
             
             <tr>
               
               <td><?php echo $row['name'];?></td>
<td>
<button><a href="uploads/<?=$row['file_url']?>">Download</a></button>
</td>

               <td>
               <button><a href="deletef.php?userid=<?php echo $row['id']; ?>">Delete</a></button>

               </td>
           </tr>



          		
    <?php } } 
  else
  {
    echo "<br>";
    echo "</br>";
    echo "<h2><br>No files left in your gallery<br></h2>";
    echo "<br>";
    echo "</br>";
    echo "<h3><br><br>Click on Upload file to add files</h3>";
   
  
  }

  
  }?>
			  
</body>
</html>
