<?php
require_once("include/session.php");
require_once("include/initialize.php");

$lessonid = $_GET['id'];
if (empty($lessonid)) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
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
<h1>Question</h1>
<h5>Choose the correct answer.</h5>

<div style="height:250px;overflow-y:auto;">
<?php
$sql = "SELECT * FROM tblexercise WHERE LessonID = '{$lessonid}'";
$mydb->setQuery($sql);
$questions = $mydb->loadResultList();

foreach ($questions as $question) {
    ?>
    <form method="POST" action="processscore.php">
        <div><?php echo htmlspecialchars($question->Question); ?></div>
        <div class="col-md-3">
            <input class="radios" type="radio" name="choice_<?php echo $question->ExerciseID; ?>" value="<?php echo $question->ChoiceA; ?>"> A. <?php echo htmlspecialchars($question->ChoiceA); ?>
        </div>
        <div class="col-md-3">
            <input class="radios" type="radio" name="choice_<?php echo $question->ExerciseID; ?>" value="<?php echo $question->ChoiceB; ?>"> B. <?php echo htmlspecialchars($question->ChoiceB); ?>
        </div>
        <div class="col-md-3">
            <input class="radios" type="radio" name="choice_<?php echo $question->ExerciseID; ?>" value="<?php echo $question->ChoiceC; ?>"> C. <?php echo htmlspecialchars($question->ChoiceC); ?>
        </div>
        <div class="col-md-3">
            <input class="radios" type="radio" name="choice_<?php echo $question->ExerciseID; ?>" value="<?php echo $question->ChoiceD; ?>"> D. <?php echo htmlspecialchars($question->ChoiceD); ?>
        </div>
        <input type="hidden" name="LessonID" value="<?php echo $lessonid; ?>">
    </form>
    <br>
    <?php
}
?>
</div>

<form action="processscore.php" method="POST" style="margin-top: 100px;text-align: right;">
    <input type="hidden" name="LessonID" value="<?php echo $lessonid; ?>">
    <button class="btn btn-md btn-primary" type="submit" name="btnSubmit">Submit <i class="fa fa-arrow-right"></i></button>
</form>

</body>
</html>
