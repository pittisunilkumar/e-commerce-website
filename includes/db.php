<?php

$con =mysqli_connect("localhost","root","","shopping");

if (mysqli_connect_errno()){
    echo "failed to connect to mysql: ". mysqli_connect_error();
}

mysqli_query($con,"SET NAMES 'utf8' ");

?>