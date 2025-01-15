<?php 
session_start();
include("db.php");
if (isset($_POST['submit'])) {
    // Retrieve form data
    $first_name = $_POST['first_name'] ?? '';
    $middle_name = $_POST['middle_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $tags = $_POST['inputTags'] ?? '';  // Now it will hold the comma-separated tags string
    $role = $_POST['role'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $description = $_POST['description'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Handle uploaded file
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_name = basename($_FILES['image']['name']);
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Ensure correct permissions
    }
    $target_file = $upload_dir . $image_name;
    $File_name = $image_name;
    if (move_uploaded_file($image_tmp, $target_file)) {
    } else {
        echo 'Failed to upload image.<br>';
    }
} else {
    echo 'No image uploaded or an error occurred.<br>';
}
    // Validate passwords
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match please try again letter!');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit();
    }

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists. Please try diffrent email!');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit();
    }
$iquery = "insert into users (first_name,middle_name,last_name,email,tags,role,gender,description,file,password) values('$first_name','$middle_name','$last_name','$email','$tags','$role','$gender','$description','$File_name','$confirm_password')";

if ($conn->query($iquery) === TRUE) {
    $userId = $conn->insert_id;
    echo "<script>
    alert('Registration successful! User ID: " . $userId . "');
    setTimeout(function() {
        window.location.href = 'login.php';
    }, 3000);
</script>";
} else {
    echo "Error: " . $conn->error . "<br>";
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/icon type">
    <style>
        .error {
            color: red;
            font-size: 0.875em;
        }
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            border: 1px solid #ced4da;
            padding: 5px;
            border-radius: 0.375rem;
        }
        .tag {
            background-color: #e9ecef;
            border-radius: 15px;
            padding: 5px 10px;
            font-size: 0.875em;
            display: flex;
            align-items: center;
        }
        .tag button {
            background: none;
            border: none;
            font-size: 1em;
            margin-left: 5px;
            cursor: pointer;
        }
        .tag-input {
            flex: 1;
            border: none;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="body">
    <nav>
        <div class="logo">
            <img src="logo3.png" alt="logo" width="100px">
        </div>
    </nav>
    <div class="container">
    <h2 class="heading text-center">Class Registration</h2>
    <p class="text-center subtitle">Fill out the form carefully for registration</p>
    <form id="registrationForm" action="#" method="post" enctype="multipart/form-data">
        <!-- Name Section -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="firstName" placeholder="First Name">
                <span class="error" id="errorFirstName"></span>
            </div>
            <div class="col-md-4">
                <label for="middleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" name="middle_name" id="middleName" placeholder="Middle Name">
                <span class="error" id="errorMiddleName"></span>
            </div>
            <div class="col-md-4">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name">
                <span class="error" id="errorLastName"></span>
            </div>
        </div>

        <!-- Email Section -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
            <span class="error" id="errorEmail"></span>
        </div>

        <!-- Tags Section -->
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <div class="tags-container" id="tagsContainer">
                <input type="hidden" name="inputTags" id="hiddenTags">
                <input type="text" name="tags" class="tag-input" id="tagInput" placeholder="Type and press space">
            </div>
            <span class="error" id="errorTags"></span>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" class="form-control" id="image">
            <span class="error" id="errorImage"></span>
        </div>

        <!-- Role Section -->
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role" id="role">
                <option selected disabled>Please Select</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <span class="error" id="errorRole"></span>
        </div>

        <!-- Gender Section -->
        <div class="mb-3">
            <label class="form-label">Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                <label class="form-check-label" for="other">Other</label>
            </div>
            <span class="error" id="errorGender"></span>
        </div>

        <!-- Description Section -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
            <span class="error" id="errorDescription"></span>
        </div>

        <!-- Password Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <span class="error" id="errorPassword"></span>
            </div>
            <div class="col-md-6">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                <span class="error" id="errorConfirmPassword"></span>
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="mb-3 form-check">
            <input type="checkbox" name="agree" class="form-check-input" id="agreeTerms">
            <label class="form-check-label" for="agreeTerms">I agree to the <a href="#">terms and conditions</a></label>
            <span class="error" id="errorAgree"></span>
        </div>

        <!-- Submit Button -->
        <button type="submit" name="submit" class="submit btn btn-primary w-100">Submit</button>
        <p style="color:#ffffff;text-align:center">
            Already have an account? <span style="color:green"><a style="text-decoration: none;" href="login.php">Sign In</a></span>
        </p>
    </form>
</div>

    <script>
        // Tags functionality
        // Tags functionality
const tagInput = document.getElementById('tagInput');
const tagsContainer = document.getElementById('tagsContainer');
const hiddenTags = document.getElementById('hiddenTags'); // Hidden input for tags
const errorTags = document.getElementById('errorTags');
const tags = [];

tagInput.addEventListener('keyup', (e) => {
    if (e.key === ' ' && tagInput.value.trim() !== '') {
        const tagText = tagInput.value.trim();
        if (!tags.includes(tagText)) {
            tags.push(tagText);
            const tag = document.createElement('div');
            tag.classList.add('tag');
            // Add name attribute
            tag.setAttribute('name', 'inputTags');
            tag.innerHTML = `${tagText} <button type="button">&times;</button>`;

            tag.querySelector('button').addEventListener('click', () => {
                tags.splice(tags.indexOf(tagText), 1);
                tag.remove();
                updateHiddenTags();
            });

            tagsContainer.insertBefore(tag, tagInput);
            updateHiddenTags(); // Update hidden tags when a tag is added
        }
        tagInput.value = '';
    }
});

// Function to update the hidden input field with the tags
function updateHiddenTags() {
    hiddenTags.value = tags.join(','); // Join the tags with commas
}

// Form validation
document.getElementById('registrationForm').addEventListener('submit', function (e) {
    let isValid = true;

    // Clear previous errors
    document.querySelectorAll('.error').forEach(el => el.textContent = '');

    // Validate Tags
    if (tags.length === 0) {
        isValid = false;
        errorTags.textContent = 'At least one tag is required.';
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        e.preventDefault();
    }
});


        // Form validation
        document.getElementById('registrationForm').addEventListener('submit', function (e) {
            let isValid = true;

            // Clear previous errors
            document.querySelectorAll('.error').forEach(el => el.textContent = '');

            // Validate First Name
            const firstName = document.getElementById('firstName');
            if (!firstName.value.trim()) {
                isValid = false;
                document.getElementById('errorFirstName').textContent = 'First Name is required.';
            }

            // Validate Email
            const email = document.getElementById('email');
            if (!email.value.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                isValid = false;
                document.getElementById('errorEmail').textContent = 'Valid email is required.';
            }

            // Validate Tags
            if (tags.length === 0) {
                isValid = false;
                errorTags.textContent = 'At least one tag is required.';
            }

            // Validate Passwords
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');
            if (!password.value.trim()) {
                isValid = false;
                document.getElementById('errorPassword').textContent = 'Password is required.';
            } else if (password.value !== confirmPassword.value) {
                isValid = false;
                document.getElementById('errorConfirmPassword').textContent = 'Passwords do not match.';
            }

            // Validate Agree Terms
            const agreeTerms = document.getElementById('agreeTerms');
            if (!agreeTerms.checked) {
                isValid = false;
                document.getElementById('errorAgree').textContent = 'You must agree to the terms and conditions.';
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
    </div>
</body>
</html>
