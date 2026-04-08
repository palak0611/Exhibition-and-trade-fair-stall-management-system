<?php
include 'db.php';

$id=$_GET['id'];
$conn->query("DELETE FROM stalls WHERE stall_id=$id");

header("Location: admin_dashboard.php");
?>