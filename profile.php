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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"><?php echo $profileHeading; ?></h2>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Description</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["middle_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["role"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td>
                        <img src="uploads/<?php echo htmlspecialchars($row['file']); ?>" alt="User Image" width="100" height="100">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
