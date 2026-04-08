<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

$user = $_SESSION['user'];

// Get role
$res = $conn->query("SELECT role FROM users WHERE email='$user'");
$data = $res->fetch_assoc();

// Stats
$total = $conn->query("SELECT COUNT(*) as t FROM stalls")->fetch_assoc()['t'];
$available = $conn->query("SELECT COUNT(*) as a FROM stalls WHERE status='Available'")->fetch_assoc()['a'];
$booked = $conn->query("SELECT COUNT(*) as b FROM stalls WHERE status='Booked'")->fetch_assoc()['b'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(to right, #141e30, #243b55);
    color: white;
}

/* Navbar */
.navbar {
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(10px);
}

/* Cards */
.card {
    border-radius: 15px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

/* Stall Card */
.stall-card {
    background: white;
    color: black;
    border-radius: 15px;
    padding: 15px;
    transition: 0.3s;
}

.stall-card:hover {
    transform: scale(1.05);
}

/* Stats */
.stat-card {
    text-align: center;
    padding: 20px;
}
</style>

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark">
<div class="container">
    <span class="navbar-brand">🎪 Dashboard</span>

    <div>
        <span class="me-3">👤 <?php echo $user; ?></span>
        <a href="my_bookings.php" class="btn btn-info btn-sm">My Bookings</a>

        <?php if($data['role']=='admin'){ ?>
        <a href="admin_dashboard.php" class="btn btn-warning btn-sm">Admin</a>
        <?php } ?>

        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</div>
</nav>

<div class="container mt-4">

<!-- Stats -->
<div class="row text-dark mb-4">

<div class="col-md-4">
<div class="card stat-card bg-warning">
<h4>Total Stalls</h4>
<h2><?php echo $total; ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card stat-card bg-success">
<h4>Available</h4>
<h2><?php echo $available; ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card stat-card bg-danger">
<h4>Booked</h4>
<h2><?php echo $booked; ?></h2>
</div>
</div>

</div>

<!-- Stall Cards -->
<h3 class="mb-3">Available Stalls</h3>

<div class="row">

<?php
$result = $conn->query("SELECT * FROM stalls");

while($row = $result->fetch_assoc()){
?>

<div class="col-md-4 mb-4">
<div class="stall-card shadow">

<h5><?php echo $row['stall_name']; ?></h5>
<p>📂 <?php echo $row['category']; ?></p>
<p>💰 ₹<?php echo $row['price']; ?></p>

<?php if($row['status']=="Available"){ ?>
<a href="book_stall.php?id=<?php echo $row['stall_id']; ?>" 
class="btn btn-success w-100">Book Now</a>
<?php } else { ?>
<span class="badge bg-danger w-100">Booked</span>
<?php } ?>

</div>
</div>

<?php } ?>

</div>

</div>

</body>
</html>