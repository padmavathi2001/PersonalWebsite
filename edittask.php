
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
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
      height:100%;
      width:100%;
      background-image:url('p4.jpg');
  background-repeat: no-repeat;
  background-size: cover;
			
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
    color:white;
    font-size:15px;
    border:none;
   border-radius:20px;
  background-color:lightgreen;
  height:40px;
  width:80px;
}
button:hover
{
	background:  linear-gradient(green,white);
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
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  color:white;
}

tr:nth-child(even) {
  color:white;
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

    
    if(!isset($_SESSION['fname']))
    {
        header('location:index.php');
    }

    else

    {

 $name3 = $_SESSION['tname'];
$query = "SELECT * FROM $name3";
          $res = mysqli_query($conn,  $query);
?>
<br><br>          <table>
          <tr>
              <th>Task Name</th>
              <th>Completed?</th>
          </tr>

<?php

          if (mysqli_num_rows($res) > 0) {
            echo "<br>";
            echo "</br>";
      ?>        

  <?php
          	while ($row = mysqli_fetch_assoc($res)) {  ?>
             
             <tr>
               
               <td><?php echo $row['task'];?></td>
    <td>
               <button><a href="deletet.php?task=<?php echo $row['task']; ?>">Completed</a></button>

               </td>
           </tr>



          		
    <?php } } 
  else
  {
    echo "<h2><br>No tasks left in your list<br></h2>";
    echo "<br>";
    echo "</br>";
    echo "<h3><br><br>Click on store new tasks to add Tasks</h3>";
   
  
  }

}
  
  }?>
			  
</body>
</html>
