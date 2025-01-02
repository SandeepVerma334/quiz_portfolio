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
    <style>
        /* General Styles */
        body {
            background: linear-gradient(to bottom, #a8c0ff, #3f7cac);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        button.cross {
            left: 13rem;
            font-size: 18px;
            padding: 3px 8px 3px 8px;
        }
        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: #ecf0f1;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px;
            padding: 20px;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ecf0f1;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #2c3e50;
        }

        .toggle-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background: #3498db;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-button.cross::before {
            content: '✖';
        }

        .toggle-button.menu::before {
            content: '☰';
        }

        .content {
            margin-left: 20px;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .content.shifted {
            margin-left: 270px;
        }
    </style>
</head>
<body>
<div class="sidebar" id="sidebar">
        <h3>Dashboard</h3>
        <ul>
            <li><button onclick="window.location.href='logout.php'">Logout</button></li>
            <li><a href="#" id="homeLink">Home</a></li>
            <li><a href="#" id="AdminprofileLink">Profile</a></li>
            <li><a href="#" id="usersLink">Users</a></li>
        </ul>
    </div>

    <!-- Toggle Button -->
    <button class="toggle-button menu" id="toggleButton"></button>

    <!-- Content -->
    <div class="content" id="contents">
        <h2 id="home">Welcome to the User Dashboard</h2>
        <p>Use the menu to navigate through different sections of the dashboard.</p>
        <div id="AdminprofileContent"></div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('toggleButton');
        const contents = document.getElementById('contents');
        const AdminprofileLink = document.getElementById('AdminprofileLink');
        const usersLink = document.getElementById('usersLink');
        const AdminprofileContent = document.getElementById('AdminprofileContent');

        // Toggle Sidebar
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            content.classList.toggle('shifted');

            // Change button icon
            if (sidebar.classList.contains('open')) {
                toggleButton.classList.replace('menu', 'cross');
            } else {
                toggleButton.classList.replace('cross', 'menu');
            }
        });

        // Admin Profile Link Click - Fetch Admin Profile Data Dynamically
        AdminprofileLink.addEventListener('click', (e) => {
            e.preventDefault();  // Prevent default link behavior

            // Fetch profile content
            fetch('AdminProfile.php')
                .then(response => response.text())
                .then(data => {
                    // Insert the profile data into the content section
                    AdminprofileContent.innerHTML = data;
                })
                .catch(error => {
                    AdminprofileContent.innerHTML = "<p>Error loading profile data.</p>";
                    console.error('Error fetching profile:', error);
                });
        });

        // Admin USer Tabs Link Click - Fetch All Users Data Dynamically
        usersLink.addEventListener('click', (e) => {
            e.preventDefault();
            fetch('users.php')
                .then(response => response.text())
                .then(data => {
                    AdminprofileContent.innerHTML = data;
                })
                .catch(error => {
                    AdminprofileContent.innerHTML = "<p>Error loading quiz data.</p>";
                    console.error('Error fetching quiz:', error);
                });
        });
    </script>
    <div class="container">


</div>
</body>
</html>
