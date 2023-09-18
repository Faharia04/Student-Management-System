<?php session_start(); ?>
<?php require_once('../../../database/db_connect.php'); ?>
<?php
$course_id = $_GET['course_id'];
$student_id = $_SESSION['student_id'];

$query = 'DELETE FROM grades WHERE student_id = :student_id AND course_id = :course_id';

$stm = $db->prepare($query);
$stm->bindValue(':student_id', $student_id);
$stm->bindValue(':course_id', $course_id);
$execute_success = $stm->execute();
$stm->closeCursor();
if (!$execute_success) {
  print_r($stm->errorInfo()[2]);
}

header("Location: student_grades.php");
 ?>
