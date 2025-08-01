<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "edtech"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Processing the login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit;
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Successful login
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fullname'];

            echo "<script>alert('Login successful!'); window.location.href = 'dashboard.php';</script>";
        } else {
            // Incorrect password
            echo "<script>alert('Invalid email or password.');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    } else {
        // Email not found
        echo "<script>alert('No account found with this email.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>