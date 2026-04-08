<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

$stall_id = $_GET['id'];

// Get stall details
$stall = $conn->query("SELECT * FROM stalls WHERE stall_id=$stall_id")->fetch_assoc();

// Get user
$user = $_SESSION['user'];
$res = $conn->query("SELECT id FROM users WHERE email='$user'");
$user_data = $res->fetch_assoc();
$user_id = $user_data['id'];

// Booking logic
if(isset($_POST['confirm'])){
    $conn->query("INSERT INTO bookings(user_id, stall_id, booking_date)
    VALUES($user_id, $stall_id, CURDATE())");

    $conn->query("UPDATE stalls SET status='Booked' WHERE stall_id=$stall_id");

    echo "<script>alert('🎉 Stall Booked Successfully!');
    window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Stall</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(to right,#667eea,#764ba2);
}
.card {
    border-radius: 15px;
}
</style>

</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-4" style="width:400px;">

<h3 class="text-center mb-3">🎪 Confirm Booking</h3>

<div class="mb-3">
<p><strong>Stall Name:</strong> <?php echo $stall['stall_name']; ?></p>
<p><strong>Category:</strong> <?php echo $stall['category']; ?></p>
<p><strong>Price:</strong> ₹<?php echo $stall['price']; ?></p>
<p><strong>Status:</strong> 
<span class="badge bg-success"><?php echo $stall['status']; ?></span>
</p>
</div>

<form method="POST">

<?php if($stall['status']=="Available"){ ?>
<button class="btn btn-success w-100" name="confirm">
Confirm Booking
</button>
<?php } else { ?>
<div class="alert alert-danger text-center">
Already Booked ❌
</div>
<?php } ?>

</form>

<br>
<a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>

</div>

</div>

</body>
</html>