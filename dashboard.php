<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edtech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You are not logged in. Please log in.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id']; // Retrieve logged-in user ID from session

// Fetch the user's current details from the database
$sql = "SELECT fullname FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $fullname = $user['fullname']; // Get the full name of the user
} else {
    echo "<script>alert('User not found. Please log in again.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

.greeting {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}
.content {
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 5px;
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
}

.card {
    border: none;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-size: 1.25rem;
}

footer {
    background-color: #212529;
    color: #fff;
}
/* Default (Light Mode) */
:root {
    --background-color: #ffffff;
    --text-color: #000000;
    --primary-color: #4CAF50;
}

/* Dark Mode */
body.dark-mode {
    --background-color: #121212;
    --text-color: #ffffff;
    --primary-color: #BB86FC;
}

/* Apply Variables */
body {
    background-color: var(--background-color);
    color: var(--text-color);
}

.nav-brand {
    color: var(--primary-color);
}

.theme-btn {
    background: none;
    border: none;
    font-size: 1.2em;
    cursor: pointer;
}
</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">EdTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
                <div class="nav-brand"></div>
                <button id="theme-toggle" class="theme-btn">🌙</button>
            </div>
        </div>
    </nav>

    <div class="greeting" id="greeting"></div>

    <!-- Main Dashboard -->
    <div class="container my-5">
        <div class="row mb-4">
            <div class="col text-center">
                <h1>Welcome, Idris Ibrahim!</h1>
                <p>Your learning journey starts here.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- User Info Card -->
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Your Info</h5>
                        <p class="card-text"><strong>Name:</strong> Idris Ibrahim</p>
                        <p class="card-text"><strong>Email:</strong> idris@example.com</p>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Stats Overview</h5>
                        <p class="card-text"><strong>Courses Completed:</strong> 5</p>
                        <p class="card-text"><strong>Assignments Pending:</strong> 2</p>
                    </div>
                </div>
            </div>

            <!-- Announcements -->
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Announcements</h5>
                        <p class="card-text">New course "Advanced Web Development" available now!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <!-- Quick Actions -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quick Action</h5>
                        <a href="#" class="btn btn-primary">Start Learning</a>
                    </div>
                </div>
            </div>

            <!-- Profile Settings -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Profile Settings</h5>
                        <a href="#" class="btn btn-secondary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <!-- Support -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Need Help?</h5>
                        <a href="#" class="btn btn-danger">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 EdTech. All Rights Reserved.</p>
    </footer>

<script>
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    // Check for saved preference in localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        body.classList.add(savedTheme);
        themeToggle.textContent = savedTheme === 'dark-mode' ? '☀️' : '🌙';
    }

    // Toggle theme on button click
    themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        const currentTheme = body.classList.contains('dark-mode') ? 'dark-mode' : '';
        localStorage.setItem('theme', currentTheme); // Save preference
        themeToggle.textContent = currentTheme === 'dark-mode' ? '☀️' : '🌙';
    });

    // Get the current hour
    const currentHour = new Date().getHours();

// Determine the greeting message based on the time of day
let greetingMessage = '';

if (currentHour < 12) {
    greetingMessage = `Good morning, <?php echo htmlspecialchars($fullname); ?>!`;
} else if (currentHour < 18) {
    greetingMessage = `Good afternoon, <?php echo htmlspecialchars($fullname); ?>!`;
} else {
    greetingMessage = `Good evening, <?php echo htmlspecialchars($fullname); ?>!`;
}

// Display the greeting message
document.getElementById('greeting').innerText = greetingMessage;

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>