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
</head>
<body>
  <?php 
  
print_r($_SESSION);
$admin_name = $_SESSION['first_name'];
$admin_last = $_SESSION['last_name'];
$admin_role = $_SESSION['role'];
$admin_email = $_SESSION['email'];
$admin_description = $_SESSION['description'];
$tags = $_SESSION['tags'];

?>  
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Discription</th>
            <th scope="col">Tags</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $_SESSION['first_name']; ?></td>
            <td><?php echo $_SESSION['last_name']; ?></td>
            <td><?php echo $_SESSION['role']; ?></td>
            <td><?php echo $_SESSION['email']; ?></td>
            <td><?php echo $_SESSION['description']; ?></td>
            <td><?php echo $_SESSION['tags']; ?></td>
        </tr>
    </tbody>


</body>
</html>