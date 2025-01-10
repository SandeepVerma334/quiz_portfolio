<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch logged-in user's data from the database using user_id
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user's data from the result
    $row = $result->fetch_assoc();
} else {
    echo "No user found.";
    exit();
}

// Set the profile heading based on the user's role
$profileHeading = ($row['role'] === 'Admin') ? 'Admin Profile' : 'User Profile';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Profile Card -->
                <div class="card text-center shadow">
                    <div class="card-body">
                        <!-- Profile Picture -->
                         <img src="uploads/<?php echo htmlspecialchars($row['file']); ?>" alt="User Image" width="100"
                            height="100"
                            class="profile-picture mx-auto d-block">

                            <!-- User Details -->
                            <h3 class="card-title"><pre class="card-title"><?php echo $row["first_name"]; ?> <?php echo $row["middle_name"];?> <?php echo $row["last_name"]; ?></pre></h3>
                            <p class="text-muted"><?php echo $row["role"]; ?></p>

                            <hr>

                            <!-- Contact Information -->
                            <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
                            <p><i class="fas fa-phone"></i> +123 456 7890</p>

                            <!-- Additional Information -->
                            <h5 class="mt-3">About Me</h5>
                            <p>
                                Passionate software engineer with expertise in web development and design.
                                Loves to work on creative projects and learn new technologies.
                            </p>

                            <!-- Social Media Links -->
                            <div>
                                <a href="https://github.com" target="_blank" class="btn btn-outline-dark btn-sm">
                                    <i class="fab fa-github"></i> GitHub
                                </a>
                                <a href="https://linkedin.com" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-linkedin"></i> LinkedIn
                                </a>
                                <a href="https://facebook.com" target="_blank" class="btn btn-outline-info btn-sm">
                                    <i class="fab fa-facebook"></i> Facebook
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>