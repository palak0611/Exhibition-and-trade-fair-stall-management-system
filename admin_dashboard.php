<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(to right, #667eea, #764ba2);
    color: white;
}

.card {
    border-radius: 15px;
}

.section-title {
    text-align: center;
    margin: 40px 0 20px;
    font-weight: bold;
}
</style>

</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">👨‍💼 Admin Dashboard</h2>

<!-- ADD STALL SECTION -->
<div class="card p-4 shadow bg-light text-dark">

<h4 class="mb-3">➕ Add New Stall</h4>

<form method="POST" class="row g-3">
    <div class="col-md-4">
        <input class="form-control" name="name" placeholder="Stall Name" required>
    </div>

    <div class="col-md-4">
        <input class="form-control" name="cat" placeholder="Category" required>
    </div>

    <div class="col-md-4">
        <input class="form-control" type="number" name="price" placeholder="Price" required>
    </div>

    <div class="col-12 text-center">
        <button type="submit" class="btn btn-success px-4" name="add">
            Add Stall
        </button>
    </div>
</form>

</div>

<?php
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $price = $_POST['price'];

    if(empty($name) || empty($cat) || empty($price)){
        echo "<script>alert('⚠️ Please fill all fields');</script>";
    } else {
        $sql = "INSERT INTO stalls(stall_name, category, price) 
                VALUES('$name', '$cat', '$price')";

        if($conn->query($sql) === TRUE){
            echo "<script>alert('✅ Stall Added Successfully');
            window.location='admin_dashboard.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!-- DIVIDER -->
<h3 class="section-title">📋 Manage Stalls</h3>

<!-- DELETE SECTION -->
<div class="card p-4 shadow bg-light text-dark">

<table class="table table-hover table-bordered text-center">

<tr class="table-dark">
    <th>Stall Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM stalls");

while($row = $res->fetch_assoc()){
    echo "<tr>
        <td>{$row['stall_name']}</td>
        <td>{$row['category']}</td>
        <td>₹{$row['price']}</td>
        <td>
            <a href='delete_stall.php?id={$row['stall_id']}' 
               class='btn btn-danger btn-sm'>
               Delete
            </a>
        </td>
    </tr>";
}
?>

</table>

</div>

<!-- BACK BUTTON -->
<div class="text-center mt-4">
    <a href="dashboard.php" class="btn btn-light">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>