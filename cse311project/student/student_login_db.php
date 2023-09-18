<?php require_once('../database/db_connect.php'); ?>
<?php
if(isset($_POST['btn-login'])){
  $student_id = trim($_POST["student_id"]);
  $password = trim($_POST["password"]);

  $query_students = 'SELECT * FROM student_reg';
  $student_statement = $db->prepare($query_students);
  $student_statement->execute();
  $students = $student_statement->fetchAll();
  $student_statement->closeCursor();

  $pass_1 = -1;
  $pass_2 = -1;
  foreach ($students as $std) {
    $db_id = $std['student_id'];
    $db_password = $std['password'];

    $pass_1 = strcmp($db_id, $student_id);
    $pass_2 = strcmp($db_password, $password);

    if ($pass_1==0 && $pass_2==0) {
      break;
    }
  }
  if ($pass_1==0 && $pass_2==0) {
    session_start();
    $_SESSION['student_id'] = $student_id;
    header("Location: student_index/student_index.php");
  } else {
    header("Location: student_login.php");
  }
}
?>
