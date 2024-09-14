<?php
require_once("include/initialize.php"); // This file handles session start and other includes

// Check if StudentID is set in the session
if (!isset($_SESSION['StudentID'])) {
    echo '<script type="text/javascript">window.location = "login.php";</script>';
    exit();
}

$studentid = $_SESSION['StudentID'];

// Check if 'score' parameter is set in the URL
$score = isset($_GET['score']) ? htmlspecialchars($_GET['score']) : '';

// Output the score if available
if (!empty($score)) {
    echo '<h1>Your Score is : ' . $score . '</h1>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image" href="img/logo-round.png" />
    <title>Brainboost E Learning Academy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Submitted Answers</h1>

<div style="height:250px;overflow-y:auto;">
<?php
// Get lesson ID from URL
$lessonid = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

if (!empty($lessonid)) {
    // Query to get questions for the lesson
    $sql = "SELECT * FROM tblexercise WHERE LessonID = '{$lessonid}'";
    $mydb->setQuery($sql);
    $questions = $mydb->loadResultList();

    foreach ($questions as $question) {
        // Query to get student's answer for the question
        $sql = "SELECT * FROM tblscore WHERE ExerciseID = '{$question->ExerciseID}' AND StudentID = '{$studentid}' AND Submitted = 1";
        $mydb->setQuery($sql);
        $answer = $mydb->loadSingleResult();

        if ($answer) {
            ?>
            <form>
                <div><?php echo htmlspecialchars($question->Question); ?></div>
                <div class="col-md-3">
                    <input class="radios" type="radio" disabled <?php echo ($answer->Answer == $question->ChoiceA) ? 'checked' : ''; ?>> A. <?php echo htmlspecialchars($question->ChoiceA); ?>
                </div>
                <div class="col-md-3">
                    <input class="radios" type="radio" disabled <?php echo ($answer->Answer == $question->ChoiceB) ? 'checked' : ''; ?>> B. <?php echo htmlspecialchars($question->ChoiceB); ?>
                </div>
                <div class="col-md-3">
                    <input class="radios" type="radio" disabled <?php echo ($answer->Answer == $question->ChoiceC) ? 'checked' : ''; ?>> C. <?php echo htmlspecialchars($question->ChoiceC); ?>
                </div>
                <div class="col-md-3">
                    <input class="radios" type="radio" disabled <?php echo ($answer->Answer == $question->ChoiceD) ? 'checked' : ''; ?>> D. <?php echo htmlspecialchars($question->ChoiceD); ?>
                </div>
            </form>
            <br>
            <?php
        } else {
            echo "<div class='alert alert-warning'>No answer found for this question.</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Invalid lesson ID.</div>";
}
?>
</div>

</body>
</html>
