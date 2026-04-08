<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Stall Management System</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    color: white;
}

/* Hero Section */
.hero {
    height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                url('https://images.unsplash.com/photo-1503428593586-e225b39bddfe');
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
}

/* Navbar */
.navbar {
    background: rgba(0,0,0,0.4);
    backdrop-filter: blur(10px);
}

/* Hero Content */
.hero-content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    flex-direction: column;
    animation: fadeIn 2s;
}

.hero h1 {
    font-size: 55px;
    font-weight: 700;
}

.hero p {
    font-size: 20px;
    margin-bottom: 20px;
}

/* Buttons */
.btn-custom {
    padding: 12px 25px;
    border-radius: 30px;
    margin: 10px;
    font-weight: 500;
    transition: 0.3s;
}

.btn-custom:hover {
    transform: scale(1.1);
}

/* Features Section */
.features {
    background: #f8f9fa;
    color: black;
    padding: 60px 0;
}

.card {
    border: none;
    border-radius: 15px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

/* Animation */
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(30px);}
    to {opacity: 1; transform: translateY(0);}
}

/* Footer */
.footer {
    background: #111;
    color: white;
    text-align: center;
    padding: 15px;
}
</style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
<div class="container">
    <a class="navbar-brand fw-bold">🎪 Stall System</a>

    <div>
        <a href="register.php" class="btn btn-outline-light btn-custom">Register</a>
        <a href="login.php" class="btn btn-warning btn-custom">Login</a>
    </div>
</div>
</nav>

<!-- Hero Section -->
<div class="hero">

<div class="hero-content">
    <h1>Exhibition & Trade Fair</h1>
    <h1>Stall Management System</h1>

    <p>Book, Manage & Explore Stalls with Ease 🚀</p>

    <div>
        <a href="register.php" class="btn btn-warning btn-lg btn-custom">Get Started</a>
        <a href="login.php" class="btn btn-outline-light btn-lg btn-custom">Login</a>
    </div>
</div>

</div>

<!-- Features -->
<section class="features text-center">
<div class="container">
<h2 class="mb-5">✨ Features</h2>

<div class="row">

<div class="col-md-4">
<div class="card p-4">
<h4>📋 Easy Booking</h4>
<p>Book stalls quickly with real-time availability.</p>
</div>
</div>

<div class="col-md-4">
<div class="card p-4">
<h4>📊 Manage Stalls</h4>
<p>Admin can manage stalls and pricing efficiently.</p>
</div>
</div>

<div class="col-md-4">
<div class="card p-4">
<h4>🔐 Secure System</h4>
<p>Safe login and protected booking system.</p>
</div>
</div>

</div>
</div>
</section>

<!-- Call to Action -->
<section class="text-center p-5 bg-dark">
<h2>Ready to Book Your Stall?</h2>
<a href="register.php" class="btn btn-warning btn-lg mt-3">Register Now</a>
</section>

<!-- Footer -->
<div class="footer">
<p>© 2026 Stall Management System | Mini Project</p>
</div>

</body>
</html>