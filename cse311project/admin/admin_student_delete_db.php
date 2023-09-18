<?php require_once('../database/db_connect.php'); ?>
<?php
$student_id = $_GET['student_id'];

$query = 'DELETE FROM grades WHERE student_id = :student_id';

$stm = $db->prepare($query);
$stm->bindValue(':student_id', $student_id);
$execute_success = $stm->execute();
$stm->closeCursor();
if (!$execute_success) {
  print_r($stm->errorInfo()[2]);
}

$query = 'DELETE FROM student_details WHERE student_id = :student_id';

$stm = $db->prepare($query);
$stm->bindValue(':student_id', $student_id);
$execute_success = $stm->execute();
$stm->closeCursor();
if (!$execute_success) {
  print_r($stm->errorInfo()[2]);
}

$query = 'DELETE FROM student_reg WHERE student_id = :student_id';

$stm = $db->prepare($query);
$stm->bindValue(':student_id', $student_id);
$execute_success = $stm->execute();
$stm->closeCursor();
if (!$execute_success) {
  print_r($stm->errorInfo()[2]);
}

header("Location: admin_student_details.php");
 ?>
