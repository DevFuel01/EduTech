<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="fontawesome/css/all.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="contact.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <img src="img/H_logo.png" height="25">
            <ul class="nav-links">
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="about.php"><i class="fas fa-info-circle"></i> About Us</a></li>
                <li><a href="contact.php"><i class="fas fa-address-book"></i> Contact Us</a></li>
                <li><a href="register.php"><i class="fas fa-user"></i> Register</a></li>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            </ul>
            <div class="hamburger" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- Contact Us Section -->
    <section class="contact-us">
        <div class="container">
            <h1>Contact Us</h1>
            <p>We would love to hear from you! Please fill out the form below or reach us via email or phone.</p>
            
            <!-- Contact Form -->
            <form action="process_form.php" method="POST">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

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