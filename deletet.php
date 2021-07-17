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


        $name3 = $_SESSION['tname'];
        $task = $_GET["task"];
        
        $query = "DELETE from $name3 WHERE task='$task'";
        
        $data = mysqli_query($conn,$query);
        
if($data)
{
    
    echo ("<script LANGUAGE='JavaScript'>
    window. alert('Deleted successfully');
    window. location. href='edittask.php';
    </script>");
    

}   
}
}


?>