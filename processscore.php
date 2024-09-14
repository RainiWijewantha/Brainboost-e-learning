<?php
require_once("include/session.php");
require_once("include/initialize.php");

$studentid = $_SESSION['StudentID'];
$lessonid = $_POST['LessonID'];

// Update the submission status
$sql = "UPDATE tblscore SET Submitted = 1 WHERE LessonID = '{$lessonid}' AND StudentID = '{$studentid}'";
$mydb->setQuery($sql);
$mydb->executeQuery();

// Calculate the total score
$sql = "SELECT SUM(Score) as 'SCORE' FROM tblscore WHERE LessonID = '{$lessonid}' AND StudentID = '{$studentid}' AND Submitted = 1";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();
$score = $res->SCORE;

// Redirect with score
header("Location: quizresult.php?id={$lessonid}&score={$score}");
exit();
?>
