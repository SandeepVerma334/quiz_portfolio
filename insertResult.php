<?php
include("db.php");
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $score = 0;
    $totalQuestions = 0;

    foreach ($_POST as $key => $value) {
        // Check if the key starts with "q" (question index)
        if (preg_match('/^q(\d+)$/', $key, $matches)) {
            $questionIndex = (int)$matches[1];  // Extract the question ID from the key
            $selectedAnswer = $value;
            $correctAnswer = $_POST['correct_q' . $questionIndex];
            $questionsId = $_POST['question_' . $questionIndex];  // Access the question ID from the hidden field
            $totalQuestions++;

            // Increment score if the answer is correct
            if ($selectedAnswer === $correctAnswer) {
                $score++;
            }

            // Insert the result into the database
            $insertQuery = "INSERT INTO result (user_id, ques_id, user_ans, correct_ans, is_correct)
                            VALUES ('$user_id', '$questionsId', '$selectedAnswer', '$correctAnswer', '" . ($selectedAnswer === $correctAnswer ? 1 : 0) . "')";
            mysqli_query($conn, $insertQuery);
        }
    }

    // Output a page with a video loader and redirect after 2 seconds
    echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Redirecting...</title>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-color: #f9f9f9;
                }
                .loader-section {
                    text-align: center;
                }
                .loader-section img {
                    width: 100px;
                    height: auto;
                }
                .loader-section h2 {
                    margin-top: 1rem;
                    font-size: 1.5rem;
                    color: #333;
                }
                     /* Fullscreen video overlay */
         .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        
        video#loadingVideo {
    width: 1519px !important;
}
        /* Prevent scrolling when the overlay is active */
        body.loading {
            overflow: hidden;
        }
            </style>
        </head>
        <body>
            <div class='loader-section'>
                <h2>Please Wait...</h2>
                <video id='loadingVideo' src='confity.mp4' autoplay muted></video>
            </div>
            <script type='text/javascript'>
                setTimeout(function() {
                    window.location.href = 'thankYou_page.php?score=$score&total=$totalQuestions';
                }, 3000); 
            </script>
        </body>
        </html>
    ";

    exit();
}
?>
