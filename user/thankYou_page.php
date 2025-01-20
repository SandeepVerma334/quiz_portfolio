<?php
include("../config/db.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the result data for the logged-in user, joining the questions table
$query = "
    SELECT result.id AS result_id, result.user_ans, result.correct_ans, result.is_correct, result.createdAt,
           questions.id AS question_id, questions.question 
    FROM result 
    JOIN questions 
    ON result.ques_id = questions.id
    WHERE result.user_id = '$user_id'
";
$result = mysqli_query($conn, $query);

// If query execution fails
if (!$result) {
    die("Error fetching results: " . mysqli_error($conn));
}

// Initialize variables for score calculation and question data
$correctCount = 0;
$wrongCount = 0;
$questionsData = [];
$score = 0;

// Fetch the result data for display
while ($row = mysqli_fetch_assoc($result)) {
    $questionsData[] = $row;

    // Count right and wrong answers
    if ($row['is_correct'] == 1) {
        $correctCount++;
        $score += 1.5; // Add 1.5 points for each correct answer
    } else {
        $wrongCount++;
    }
}

// Calculate penalty based on the number of wrong answers
$penalty = floor($wrongCount / 4); // 1 penalty per 4 wrong answers
$penaltyPerWrongAnswer = 0.375; // For each wrong answer, 0.375 points will be deducted

// Deduct the penalty from total score
$score -= $wrongCount * $penaltyPerWrongAnswer;

// Maximum possible score (1.5 points per correct answer for 10 questions)
$maxScore = 1.5 * 10;

$totalQuestions = count($questionsData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 2rem auto;
            background: #fff;
            padding: 1.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background-color: #f8f8f8;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        p {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }
        .redirect-section {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Your Quiz Results Summary</h1>
        <h3>Quiz Result</h3>
        <p>Total Questions: <?php echo $totalQuestions; ?></p>
        <p>Correct Answers: <?php echo $correctCount; ?></p>
        <p>Wrong Answers: <?php echo $wrongCount; ?></p>
        <p>Total Score: <strong><?php echo $score . " / " . $maxScore; ?></strong></p>

        <h2>Questions & Answers</h2>
        <table>
            <thead>
                <tr>
                    <th>Result ID</th>
                    <th>Question</th>
                    <th>Your Answer</th>
                    <th>Correct Answer</th>
                    <th>Status</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questionsData as $data): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($data['result_id']); ?></td>
                        <td><?php echo htmlspecialchars($data['question']); ?></td>
                        <td><?php echo htmlspecialchars($data['user_ans']); ?></td>
                        <td><?php echo htmlspecialchars($data['correct_ans']); ?></td>
                        <td>
                            <?php echo $data['is_correct'] == 1 ? '<span style="color: green;">Correct</span>' : '<span style="color: red;">Wrong</span>'; ?>
                        </td>
                        <td><?php echo htmlspecialchars($data['createdAt']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="redirect-section">
            <p>You will be redirected to the dashboard in 3 seconds...</p>
        </div>
    </div>

    <script type="text/javascript">
        // Redirect to the dashboard after 3 seconds
        setTimeout(function() {
            window.location.href = '../dashboard.php'; // Change this to the actual dashboard page URL
        }, 3000); 
    </script>
</body>
</html>
