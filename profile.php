<?php
session_start();
include("db.php");

// Debugging: Uncomment the following line to print session data for debugging.
// echo '<pre>';
// print_r($_SESSION());
// echo '</pre>';

// Ensure the user is logged in by checking session data
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h2>Profile</h2>

    <table class="table table-striped">
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
                <td><img src="uploads/<?php echo $row['file']; ?>" alt="User Image" width="100" height="100"></td>
            </tr>
        </tbody>
    </table>

</body>
</html>
