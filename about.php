<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="fontawesome/css/all.css"> <!-- Font Awesome -->
</head>
<body>
    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="container">
            <img src="img/H_logo.png" height="25">
            <ul class="nav-links" id="navLinks">
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

    <!-- About Us Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1>Welcome to Hamzury Innovation Hub</h1>
            <p>We are a passionate team building the future of tech education and product development.</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="our-story">
        <div class="container">
            <h2>Our Story</h2>
            <p>At Hamzury Innovation Hub, we are dedicated to creating a dynamic environment where innovation thrives. Our journey started with a vision to empower tech enthusiasts and students by providing hands-on experiences and practical skills.</p>
        </div>
    </section>

    <!-- Our Mission & Vision Section -->
    <section class="mission-vision">
            <div class="mission">
                <h2>Our Mission</h2>
                <p>To foster a tech-driven ecosystem where students and professionals can learn, grow, and innovate to change the world.</p>
            </div>
            <div class="vision">
                <h2>Our Vision</h2>
                <p>To be the leading hub for tech education and product development in northern Nigeria and beyond.</p>
            </div>
    </section>

    <!-- Meet the Team Section -->
    <section class="team">
        <div class="container">
            <h2>Meet the Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="team-member1.jpg" alt="Team Member">
                    <h3>John Doe</h3>
                    <p>CEO & Founder</p>
                </div>
                <div class="team-member">
                    <img src="team-member2.jpg" alt="Team Member">
                    <h3>Jane Smith</h3>
                    <p>CTO</p>
                </div>
                <div class="team-member">
                    <img src="team-member1.jpg" alt="Team Member">
                    <h3>John Doe</h3>
                    <p>CEO & Founder</p>
                </div>
                <div class="team-member">
                    <img src="team-member2.jpg" alt="Team Member">
                    <h3>Jane Smith</h3>
                    <p>CTO</p>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="container">
            <h2>Why Choose Us?</h2>
            <div class="reasons-grid">
                <div class="reason-item">
                    <i class="fas fa-cogs"></i>
                    <h3>Innovative Approach</h3>
                    <p>We offer hands-on projects and real-world experience to help students develop essential skills.</p>
                </div>
                <div class="reason-item">
                    <i class="fas fa-users"></i>
                    <h3>Experienced Team</h3>
                    <p>Our team of experts provides mentorship and guidance to ensure success at every stage.</p>
                </div>
                <div class="reason-item">
                    <i class="fas fa-globe"></i>
                    <h3>Global Impact</h3>
                    <p>We are committed to preparing students to work in a global tech ecosystem and become leaders in the industry.</p>
                </div>
            </div>
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