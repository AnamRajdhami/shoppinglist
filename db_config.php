<?php
$conn = new mysqli("localhost", "root", "", "todolist");

if($conn->connect_error){
    die($conn->connect_error);
}

?>