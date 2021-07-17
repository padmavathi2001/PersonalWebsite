<?php



include 'db_conn.php';

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

$name = $_SESSION['fname'];
$id = $_GET["userid"];
$query = "DELETE from $name WHERE id='$id'";

$data = mysqli_query($conn,$query);

if($data)
{
    
    echo ("<script LANGUAGE='JavaScript'>
    window. alert('Deleted successfully');
    window. location. href='displayf.php';
    </script>");
    

}   
}
}


?>