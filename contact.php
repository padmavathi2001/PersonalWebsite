
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

.info
  {
    color:white;
    
    font-weight:bold;
    text-align:center;
    justify-content:center;
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

  ?>

<div class="info">
<br>
<br>

<pre>


</pre>

<h2>Mail Id: settipadmavathi100@gmail.com</h2>



</div>

</body>
</html>
