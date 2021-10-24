<?php 

    $con = mysqli_connect(getenv("DB_HOST"),getenv("DB_USER"),getenv("DB_PASSWORD"),'sigmadb');

    if(!$con)
    {
        echo 'Please check your Database Connection';
    }

?>
