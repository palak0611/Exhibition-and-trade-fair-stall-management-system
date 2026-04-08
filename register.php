<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary">

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow" style="width:350px">

<h3 class="text-center">Register</h3>

<form method="POST">
<input class="form-control mb-2" name="name" placeholder="Name" required>
<input class="form-control mb-2" name="email" placeholder="Email" required>
<input class="form-control mb-2" type="password" name="password" placeholder="Password" required>

<button class="btn btn-success w-100" name="register">Register</button>
</form>

</div>
</div>

</body>
</html>

<?php
if(isset($_POST['register'])){
$conn->query("INSERT INTO users(name,email,password)
VALUES('{$_POST['name']}','{$_POST['email']}','{$_POST['password']}')");
echo "<script>alert('Registered Successfully')</script>";
}
?>