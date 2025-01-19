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
$serialNumber = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body class="result_body">

    <div class="result_container">
        <h1 class="result_heading">Quiz Result</h1>
        
        <?php if ($totalQuestions > 0): ?>
            <h2>Questions & Answers</h2>
            <table>
                <thead>
                    <tr>
                        <th>Sr no.</th>
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
                            <td><?php echo $serialNumber++; ?></td>
                            <td><?php echo htmlspecialchars($data['question']); ?></td>
                            <td><?php echo htmlspecialchars($data['user_ans']); ?></td>
                            <td><?php echo htmlspecialchars($data['correct_ans']); ?></td>
                            <td>
                                <?php echo $data['is_correct'] == 1 
                                    ? '<span style="color: green;">Correct</span>' 
                                    : '<span style="color: red;">Wrong</span>'; ?>
                            </td>
                            <td><?php echo htmlspecialchars($data['createdAt']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="result_info">Total Score: <strong><?php echo $score . " / " . $maxScore; ?></strong></p>
        <?php else: ?>
            <p class="result_attempt_info">No quiz attempt found. Please take the quiz to see your results.</p>
        <?php endif; ?>
    </div>

</body>
</html>
