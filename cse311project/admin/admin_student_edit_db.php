<?php session_start(); ?>
<?php require_once('../database/db_connect.php'); ?>
<?php
$course_id = $_GET['course_id'];
$student_id = $_SESSION['student_id'];

if(isset($_POST['btn-grade'])){
  $grade = trim($_POST["grade"]);

  $query1 = 'SELECT * FROM student_reg RG INNER JOIN grades GD ON RG.student_id = GD.student_id WHERE RG.student_id=:student_id';
  $stm = $db->prepare($query1);
  $stm->bindValue(':student_id', $student_id);
  $stm->execute();
  $student_edit = $stm->fetchAll();
  $stm->closeCursor();

  $pass_1 = -1;
  $pass_2 = -1;
  foreach ($student_edit as $std) {
    $db_course_id = $std['course_id'];
    $db_student_id =$std['student_id'];

    $pass_1 = strcmp($db_course_id, $course_id);
    $pass_2 = strcmp($db_student_id, $student_id);
    if ($pass_1==0 && $pass_2==0) {
      if (!preg_match("/[A-F-+]{0,2}$/", $grade)) {
        $err_msg = "Grade Not Valid<br>";
        include('../database/db_error.php');
      } else {
        $query = 'UPDATE grades SET grade = :grade WHERE course_id = :course_id AND student_id = :student_id';

        $stm = $db->prepare($query);
        $stm->bindValue(':grade', $grade);
        $stm->bindValue(':course_id', $course_id);
        $stm->bindValue(':student_id', $student_id);
        $execute_success = $stm->execute();
        $stm->closeCursor();
        if (!$execute_success) {
          print_r($stm->errorInfo()[2]);
        }
        header("Location: admin_student_details.php");
      }
      break;
    }
  }
}
 ?>
