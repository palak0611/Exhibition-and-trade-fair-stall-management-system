<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

$user = $_SESSION['user'];
$res = $conn->query("SELECT id FROM users WHERE email='$user'");
$user_id = $res->fetch_assoc()['id'];

$query = "SELECT stalls.stall_name, stalls.category, stalls.price, bookings.booking_date
          FROM bookings
          JOIN stalls ON bookings.stall_id = stalls.stall_id
          WHERE bookings.user_id = $user_id";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Bookings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(to right, #43cea2, #185a9d);
    color: white;
}

.card {
    border-radius: 15px;
}

.table {
    border-radius: 10px;
    overflow: hidden;
}
</style>

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">📋 My Bookings</span>
    <a href="dashboard.php" class="btn btn-light">Back</a>
  </div>
</nav>

<div class="container mt-5">

<div class="card shadow p-4">

<h3 class="text-center mb-4 text-dark">Your Booked Stalls</h3>

<table class="table table-hover table-bordered text-center">

<tr class="table-dark">
    <th>Stall Name</th>
    <th>Category</th>
    <th>Price (₹)</th>
    <th>Booking Date</th>
</tr>

<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>{$row['stall_name']}</td>
            <td>{$row['category']}</td>
            <td>{$row['price']}</td>
            <td>{$row['booking_date']}</td>
        </tr>";
    }
} else {
    echo "<tr>
        <td colspan='4' class='text-center text-danger'>
        No bookings yet 😢
        </td>
    </tr>";
}
?>

</table>

</div>

</div>

</body>
</html>