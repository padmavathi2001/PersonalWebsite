
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>

    <style>
.b
{
    background-color:blueviolet;
    text-align: center;
    color:white;
    font-weight: bold;
    font-size: 26px;
    position:fixed;
   
}

    </style>
</head>
<body>
    
</body>
</html>


<?php
session_start();
session_unset();
session_destroy();

echo ("<script LANGUAGE='JavaScript'>
window. alert('Succesfully logged out');
window. location. href='index.php';
</script>");

?>