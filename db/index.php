<?php 

$connection = mysqli_connect('localhost','root','','todoApp');

if(!$connection){
    die('connection unsuccessful' . mysqli_connect_error());
}


?>