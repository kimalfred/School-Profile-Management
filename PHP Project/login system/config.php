<?php

$conn = mysqli_connect('localhost','root','','user_db');

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}
?>