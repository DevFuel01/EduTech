<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    opacity: 0;
    animation: fadeIn 1.5s ease-in forwards;
}

/* Fade In Animation */
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

/* Navbar */
.navbar {
    background-color: rgb(7, 7, 67);
    color: white;
    padding: 1rem;
}

.navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-links {
    list-style: none;
    display: flex;
}

.nav-links li {
    margin-left: 15px;
}

.nav-links a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    display: flex;
    align-items: center;
}

.nav-links a i {
    margin-right: 5px;
    margin-left: 5px;
}

/* Form Styling */
.form-container {
    max-width: 400px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: rgb(7, 7, 67);
}

.form-group {
    margin-bottom: 1rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

input[type="text"], input[type="email"], input[type="password"] {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn {
    display: block;
    width: 100%;
    padding: 0.7rem;
    background-color: rgb(7, 7, 67);
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    text-align: center;
}

.btn:hover {
    background-color: rgb(5, 5, 47);
}

/* Footer */
footer {
    background-color: black;
    color: white;
    padding: 1rem 0;
    text-align: center;
}

.footer-links {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.footer-links li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
}

.login-link {
    text-align: center;
    margin-top: 15px;
}

.login-link a {
    color: #073a67;
    text-decoration: none;
    font-weight: bold;
}
.login-link a:hover {
    text-decoration: underline;
}

/* Hamburger Menu */
.hamburger {
    display: none;
    font-size: 24px;
    cursor: pointer;
    color: white;
}

.nav-links {
    display: flex;
    flex-wrap: wrap;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    /* Adjust navbar layout for smaller screens */
    .nav-links {
        display: none;
        flex-direction: column;
        background-color: rgb(7, 7, 67);
        position: absolute;
        top: 60px;
        right: 0;
        width: 100%;
        text-align: center;
        padding: 10px 0;
    }

    .nav-links.show {
        display: flex;
    }

    .hamburger {
        display: block;
    }

    .nav-links {
        flex-direction: column;
        text-align: center;
    }

    /* Adjust form container for small screens */
    .form-container {
        max-width: 100%;
        padding: 1.5rem;
    }
}

@media (max-width: 480px) {
    /* Further adjustments for very small screens (e.g., mobile phones) */
    .navbar {
        padding: 0.5rem;
    }

    .btn {
        font-size: 0.9rem;
        padding: 0.6rem;
    }
}
</style>
<link rel="stylesheet" href="fontawesome/css/all.css"> <!-- Font Awesome -->
</head>
<body>
    <!-- Navigation Bar -->
    <header class="navbar">
    <div class="container">
        <img src="img/H_logo.png" height="25">
        <nav>
            <ul class="nav-links">
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="about.php"><i class="fas fa-info-circle"></i> About Us</a></li>
                <li><a href="contact.php"><i class="fas fa-address-book"></i> Contact Us</a></li>
                <li><a href="register.php"><i class="fas fa-user"></i> Register</a></li>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            </ul>
        </nav>
        <div class="hamburger" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</header>

    <!-- Registration Form -->
    <div class="form-container">
        <h2>Login</h2>
        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="login-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hamzury Innovation Hub | All Rights Reserved</p>
        <ul class="footer-links">
            <li><a href="privacy.html">Privacy</a></li>
            <li><a href="terms.html">Terms</a></li>
        </ul>
    </footer>
    <script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('show');
    }
    </script>
</body>
</html>