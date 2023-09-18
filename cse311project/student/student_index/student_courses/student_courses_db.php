<?php session_start(); ?>
<?php require_once('../../../database/db_connect.php'); ?>
<?php
if(isset($_POST['btn-add-course'])){
  $student_id = $_SESSION['student_id'];

  $course_id = trim($_POST['course_info']);
  $semester = trim($_POST['semester']);

  $query = 'INSERT INTO grades(student_id, course_id, grade, semester) VALUES (:student_id, :course_id, :grade, :semester)';
  $stm = $db->prepare($query);
  $stm->bindValue(':student_id', $student_id);
  $stm->bindValue(':course_id', $course_id);
  $stm->bindValue(':grade', "");
  $stm->bindValue(':semester', $semester);
  $execute_success = $stm->execute();
  $stm->closeCursor();
  if (!$execute_success) {
    print_r($stm->errorInfo()[2]);
  }
  header("Location: ../student_grades/student_grades.php");
}
?>
