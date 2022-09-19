<?php 
include ('./db_config.php');

print_r($_POST);
$id=$_POST['id'];
$title=$_POST['todo'];
$sql="UPDATE todo_list SET title='$title' WHERE id=$id";
echo $sql;
$conn->query($sql);

header('location: ./index.php');
?>