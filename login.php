<?php session_start(); include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow" style="width:350px">

<h3 class="text-center mb-3">Login</h3>

<form method="POST">
    <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
    <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>

    <button class="btn btn-primary w-100" name="login">Login</button>
</form>

</div>
</div>

</body>
</html>

<?php
if(isset($_POST['login'])){
$email=$_POST['email'];
$pass=$_POST['password'];

$res=$conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");

if($res->num_rows>0){
$_SESSION['user']=$email;
header("Location: dashboard.php");
}else{
echo "<script>alert('Invalid Login')</script>";
}
}
?>