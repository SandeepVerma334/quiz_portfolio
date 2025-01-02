<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3>Dashboard</h3>
        <ul>
            <li><a href="#" id="homeLink">Home</a></li>
            <li><a href="#" id="profileLink">Profile</a></li>
            <li><a href="#" id="takeQuizLink">Take Quiz</a></li>
            <li><a href="#" id="quizResult">Results</a></li>
        </ul>
    </div>

    <!-- Toggle Button -->
    <button class="toggle-button menu" id="toggleButton"></button>

    <!-- Content -->
    <div class="content" id="content">
        <h2 id="home">Welcome to the User Dashboard</h2>
        <p>Use the menu to navigate through different sections of the dashboard.</p>
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

        // Profile Link Click - Fetch Profile Data Dynamically
        profileLink.addEventListener('click', (e) => {
            e.preventDefault();  // Prevent default link behavior

            // Fetch profile content
            fetch('profile.php')
                .then(response => response.text())
                .then(data => {
                    // Insert the profile data into the content section
                    profileContent.innerHTML = data;
                })
                .catch(error => {
                    profileContent.innerHTML = "<p>Error loading profile data.</p>";
                    console.error('Error fetching profile:', error);
                });
        });

        // Take Quiz Link Click - Fetch Take Quiz Data Dynamically
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
         // quizResult Link Click - Fetch quizResult Data Dynamically
         quizResult.addEventListener('click', (e) => {
            e.preventDefault();
            fetch('result.php')
                .then(response => response.text())
                .then(data => {
                    profileContent.innerHTML = data;
                })
                .catch(error => {
                    profileContent.innerHTML = "<p>Error loading quiz data.</p>";
                    console.error('Error fetching quiz:', error);
                });
        });
    </script>
</body>
</html>
