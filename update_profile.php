<?php
// Start the session
session_start();

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
    echo "<script>alert('You are not logged in. Please log in to update your profile.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id']; // Retrieve logged-in user ID from session

// Fetch the user's current details from the database
$fullname = "";
$email = "";
$profile_picture = "default.png"; // Default profile picture

$sql = "SELECT fullname, email, profile_picture FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $fullname = $user['fullname'];
    $email = $user['email'];
    $profile_picture = $user['profile_picture'];
} else {
    echo "<script>alert('User not found. Please log in again.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

$stmt->close();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);

    $profile_picture = $user['profile_picture']; // Keep the existing profile picture by default

    // Handle file upload
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "uploads/";
        $profile_picture = $target_dir . basename($_FILES["profile_picture"]["name"]);

        // Validate file type
        $file_type = strtolower(pathinfo($profile_picture, PATHINFO_EXTENSION));
        if (in_array($file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture)) {
                // File uploaded successfully
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type.');</script>";
            $profile_picture = $user['profile_picture'];
        }
    }

    // Update user in the database
    $sql = "UPDATE users SET fullname = ?, email = ?, profile_picture = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $fullname, $email, $profile_picture, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!');</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>