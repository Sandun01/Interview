<?php

//database connection
$connection = mysqli_connect('localhost','root','','exam');

    if(mysqli_connect_error())
    {
        echo 'Database connection failed: '. mysqli_connect_error() ; 
    }

?>