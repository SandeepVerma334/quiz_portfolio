<?php 
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="users-container">
<?php


if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit();
}

$selectQuery = "SELECT * FROM users";
$query = mysqli_query($conn, $selectQuery);
if(mysqli_num_rows($query) > 0) {
    ?>
<div class="custom-table-container">
    <div class="user-heading">
        <h2>All user data</h2>
    </div>
    <div class="table-responsive">
        <table class=" text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Role</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Profile Image</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = mysqli_fetch_array($query)) {
                    if (isset($row['role']) && $row['role'] === 'User') {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['middle_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <?php echo empty($row['tags']) ? "No Tags Found!" : $row['tags']; ?>
                            </td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <img src="uploads/<?php echo $row['file']; ?>" 
                                     alt="User Image" 
                                     width="100" 
                                     height="100">
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
          

    </tbody>
</table>
    <?php
}


?>
</div>
</body>
</html>
