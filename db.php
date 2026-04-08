<?php
$conn = new mysqli("localhost","root","","stall_management");

if($conn->connect_error){
    die("Connection failed");
}
?>