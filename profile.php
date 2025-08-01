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

// Initialize variables to avoid undefined variable error
$fullname = "";
$email = "";
$profile_picture = "default.png"; // Default profile picture

// Fetch the user's current details from the database
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .form-container {
            background-color: #fff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            color: #555;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group button {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .form-group input:focus,
        .form-group button:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .form-group img {
            max-width: 100px;
            margin-top: 10px;
            border-radius: 50%;
        }
        .form-group button {
            background-color:  rgb(7, 7, 67);
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: darkblue;
        }
        .form-group input[type="file"] {
            padding: 5px;
            cursor: pointer;
        }
        .alert {
            padding: 10px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Update Profile</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>

        <div class="form-group">
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" onchange="previewImage(event)">
            <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" id="profile_preview">
        </div>

        <div class="form-group">
            <button type="submit">Update Profile</button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('profile_preview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</body>
</html>