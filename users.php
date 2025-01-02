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
</head>
<body>
    <div class="container">
<?php


if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: login.php");
    exit();
}

$selectQuery = "SELECT * FROM users";
$query = mysqli_query($conn, $selectQuery);
if(mysqli_num_rows($query) > 0) {
    ?>
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">tags</th>
            <th scope="col">role</th>
            <th scope="col">gender</th>
            <th scope="col">description</th>
            <th scope="col">Created At</th>
            <th scope="col">Profile Image</th>
            <!-- <th scope="col">Action</th> -->
        </tr>
    </thead>
    <tbody>
    <?php 
    while($row = mysqli_fetch_array($query)) {
        // print_r($row);
        if(isset($row['role']) && $row['role'] === 'User') {
            $ID = $row['id'];
            $first_name = $row['first_name'];
            $middle_name = $row['middle_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $tags = $row['tags'];
            $role = $row['role'];
            $gender = $row['gender'];
            $description = $row['description'];
            $created_at = $row['created_at'];
            $file = $row['file'];
            ?>

<tr>
    <td><?php echo $ID; ?></td>
    <td><?php echo $first_name; ?></td>
    <td><?php echo $middle_name; ?></td>
    <td><?php echo $last_name; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php
       if (empty($tags)) {
        echo "No Tags Found!";
    } else {
        echo $tags;
    }
    ?></td>
    <td><?php echo $role; ?></td>
    <td><?php echo $gender; ?></td>
    <td><?php echo $description; ?></td>
    <td><?php echo $created_at; ?></td>
    <td><img src="uploads/<?php echo $row['file']; ?>" alt="User Image" width="100" height="100"></td>
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
<button onclick="window.location.href='logout.php'">Logout</button>
</div>
</body>
</html>
