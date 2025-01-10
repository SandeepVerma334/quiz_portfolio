<?php 
session_start();
include("db.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from the session
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role']; // Use the role directly from the session

// Debugging purpose (optional, remove in production)
// print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
      /* /* .slide_logo {
    position: relative; /* Ensures the logo aligns properly inside this container */
    /* width: 100%;
    height: 60px; /* Adjust this height to match your menu bar */
    /* display: flex;
    align-items: center; /* Vertically centers the logo */
    /* justify-content: center; /* Centers the logo horizontally */






        </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar containerslide" id="sidebar">
    <nav>
    <div class="slide_logo">
        <img src="logo3.png" alt="logo" width="100px">
    </div>
</nav>
        <h3>Dashboard</h3>
        <ul>
            <?php if ($role === 'Admin'): ?>
               

                <li><a href="#" id="profileLink">Profile</a></li>
                <li><a href="#" id="usersLink">Users</a></li>
                <li>
                <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</li>
<ol>
    <li><i class="fab fa-github"></i> </li>
    <li><i class="fab fa-linkedin" ></i> </li>
    <li><i class="fab fa-facebook" ></i> </li>
</ol>

            <?php else: ?>
               
                <li><a href="#" id="profileLink">Profile</a></li>
                <li><a href="#" id="takeQuizLink">Take Quiz</a></li>
                <li><a href="#" id="quizResult">Results</a></li>
                <li><button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button></li>
            <?php endif; ?>
        </ul>
        <ol>
    <li><i class="fab fa-github"></i> </li>
    <li><i class="fab fa-linkedin" ></i> </li>
    <li><i class="fab fa-facebook" ></i> </li>
</ol>


    </div>

    <!-- Toggle Button -->
    <button class="toggle-button menu" id="toggleButton"></button>
  
    <!-- Content -->
    <div class="content" id="content">
        <!-- <h2 id="home">Welcome to the User Dashboard</h2>
        <p>Use the menu to navigate through different sections of the dashboard.</p> -->
        <div id="profileContent"></div>
        <div id="takeQuizContent"></div>
    </div>

    <script>
       const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggleButton');
const content = document.getElementById('content');
const profileLink = document.getElementById('profileLink');
const takeQuizLink = document.getElementById('takeQuizLink');
const quizResult = document.getElementById('quizResult');
const profileContent = document.getElementById('profileContent');
const usersLink = document.getElementById('usersLink');
const logo = document.querySelector('.slide_logo img'); // Select the logo

// Toggle Sidebar
toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    content.classList.toggle('shifted');

    // Change button icon
    if (sidebar.classList.contains('open')) {
        toggleButton.classList.replace('menu', 'cross');

        // Position logo on the menu
        logo.style.position = 'absolute';
        logo.style.top = '20px';
        logo.style.left = '20px';
    } else {
        toggleButton.classList.replace('cross', 'menu');

        // Position logo on the right side of the page
        logo.style.position = 'fixed';
        logo.style.top = '20px';
        logo.style.right = '20px';
        logo.style.left = 'unset'; // Reset left positioning
    }
});

// Profile Link Click - Fetch Profile Data Dynamically
if (profileLink) {
    profileLink.addEventListener('click', (e) => {
        e.preventDefault();
        fetch('profile.php')
            .then(response => response.text())
            .then(data => {
                profileContent.innerHTML = data;
            })
            .catch(error => {
                profileContent.innerHTML = "<p>Error loading profile data.</p>";
                console.error('Error fetching profile:', error);
            });
    });
}

// Users Link (for Admin)
if (usersLink) {
    usersLink.addEventListener('click', (e) => {
        e.preventDefault();
        fetch('users.php')
            .then(response => response.text())
            .then(data => {
                profileContent.innerHTML = data;
            })
            .catch(error => {
                profileContent.innerHTML = "<p>Error loading users data.</p>";
                console.error('Error fetching users:', error);
            });
    });
}

// Take Quiz Link Click - Fetch Take Quiz Data Dynamically
if (takeQuizLink) {
    takeQuizLink.addEventListener('click', (e) => {
        e.preventDefault();
        fetch('take_quiz.php')
            .then(response => response.text())
            .then(data => {
                profileContent.innerHTML = data;
            })
            .catch(error => {
                profileContent.innerHTML = "<p>Error loading quiz data.</p>";
                console.error('Error fetching quiz:', error);
            });
    });
}

// Quiz Result Link Click - Fetch Quiz Result Data Dynamically
if (quizResult) {
    quizResult.addEventListener('click', (e) => {
        e.preventDefault();
        fetch('result.php')
            .then(response => response.text())
            .then(data => {
                profileContent.innerHTML = data;
            })
            .catch(error => {
                profileContent.innerHTML = "<p>Error loading quiz results.</p>";
                console.error('Error fetching results:', error);
            });
    });
}

    </script>
</body>
</html>
