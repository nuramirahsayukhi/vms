<?php

    $con=mysqli_connect('localhost','root','','vms');

    if(!$con)
    {
        die(' Please check your internet connection'.mysqli_error($con));
    }
?>