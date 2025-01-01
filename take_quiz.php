<?php
include("db.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch questions for the quiz
$questionsQuery = "SELECT id, question, answer FROM questions ORDER BY RAND() LIMIT 10";
$result = mysqli_query($conn, $questionsQuery);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo '<form id="quizForm">';

foreach ($questions as $index => $q) {
    // Display question
    echo "<p>Q" . ($index + 1) . ". " . $q['question'] . "</p>";

    // Get correct answer
    $correct_a = $q['answer'];

    // Generate incorrect options
    $incorrectOptions = generateIncorrectOptions($correct_a);

    // Shuffle options (correct + 3 random incorrect options)
    $options = shuffleOptions($correct_a, $incorrectOptions);

    // Display options as radio buttons
    foreach ($options as $option) {
        echo '<label><input type="radio" name="q' . $index . '" value="' . $option . '"> ' . $option . '</label><br>';
    }

    // Hidden field for the correct answer
    echo '<input type="hidden" name="correct_q' . $index . '" value="' . $correct_a . '">';
    echo '<hr>';
}

echo '<button type="submit" id="submitBtn" class="btn btn-primary">Submit Quiz</button>';
echo '</form>';

/**
 * Generate incorrect options based on technology, language, or programming
 */
function generateIncorrectOptions($correct_a)
{
    $incorrectOptions = [
        'ruby', 'swift', 'typescript', 'kotlin', 'golang', 'rust', 'scala', 'perl',
        'jquery', 'bootstrap', 'laravel', 'django', 'react', 'angular', 'vue.js',
        'flutter', 'node.js', 'git', 'docker', 'aws', 'azure', 'rails', 'express',
        'symfony', 'html5', 'css3', 'xml', 'json', 'markdown', 'xcode', 'android',
        'print_r()', 'session()', 'prisma()', 'SEO'
    ];

    // Filter out the correct answer from the options
    $incorrectOptions = array_filter($incorrectOptions, fn($option) => $option != $correct_a);

    // Ensure there are enough incorrect options (3)
    while (count($incorrectOptions) < 3) {
        // Ensure there are at least 3 options, by adding new random technology options
        $newOption = array_rand($incorrectOptions);
        if ($newOption != $correct_a && !in_array($newOption, $incorrectOptions)) {
            $incorrectOptions[] = $newOption;
        }
    }

    return $incorrectOptions;
}

/**
 * Shuffle the correct answer with the incorrect options
 */
function shuffleOptions($correct_a, $incorrectOptions)
{
    $options = [$correct_a]; // Start with the correct answer
    $randomIncorrectOptions = array_rand(array_flip($incorrectOptions), 3); // Select 3 random incorrect options
    $options = array_merge($options, (array)$randomIncorrectOptions); // Merge the correct and incorrect options
    shuffle($options); // Shuffle options to randomize
    return $options;
}
?>
