<?php
session_start();
include("config/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login/login.php");
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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">


   
 
</head>
<body>
    <div class="  profile-container">
        <h2 class="profile-heading text-center "><?php echo $profileHeading; ?></h2>




        <div class=" text-center mt-4">
    <div >
        <!-- Profile Picture -->
        <img src="uploads/<?php echo htmlspecialchars($row['file']); ?>" alt="User Image"
            class="profile-picture mx-auto d-block" style="border-radius: 50%; height: 150px; width: 150px; object-fit: cover;">

        <!-- User Details -->
        <h3 class="card-title mt-3"><?php echo $row["first_name"]; ?> <?php echo $row["middle_name"]; ?> <?php echo $row["last_name"]; ?></h3>
        <p class="text-muted"><?php echo $row["role"]; ?></p>

        <hr>

        <!-- Contact Information -->
        <p><i class="fa fa-envelope"></i> : <?php echo htmlspecialchars($row["email"]); ?></p>
        <!-- <p><strong>Phone:</strong> +123 456 7890</p> -->
        <p><i class="fa-solid fa-person-half-dress" style="font-size: 20px;"></i> : <?php echo htmlspecialchars($row["gender"]); ?></p>

        <!-- Additional Information -->
        <h5 class="mt-3">About Me</h5>
        <p>
            Passionate software engineer with expertise in web development and design.
            Loves to work on creative projects and learn new technologies.<br>
            <?php echo htmlspecialchars($row["description"]); ?>
        </p>

        <!-- Social Media Links
        <div class="mt-3">
            <a href="https://github.com" target="_blank" class="btn btn-outline-dark btn-sm">
                <i class="fab fa-github"></i> GitHub
            </a>
            <a href="https://linkedin.com" target="_blank" class="btn btn-outline-primary btn-sm">
                <i class="fab fa-linkedin"></i> LinkedIn
            </a>
            <a href="https://facebook.com" target="_blank" class="btn btn-outline-info btn-sm">
                <i class="fab fa-facebook"></i> Facebook
            </a>
        </div> -->
    </div>
</div>





    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
