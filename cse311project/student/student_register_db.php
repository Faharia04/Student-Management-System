<?php require_once('../database/db_connect.php'); ?>
<?php
if(isset($_POST['btn-register'])){
  $first_name = trim($_POST["first_name"]);
  $last_name = trim($_POST["last_name"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  if($first_name == null || $last_name == null || $email == null || $password == null) {
    $err_msg = "All Values Not Entered<br>";
    include('../database/db_error.php');
  } elseif (!preg_match("/[a-zA-Z]{3,30}$/", $first_name)) {
    $err_msg = "First Name Not Valid<br>";
    include('../database/db_error.php');
  } elseif (!preg_match("/[a-zA-Z]{3,30}$/", $last_name)) {
    $err_msg = "Last Name Not Valid<br>";
    include('../database/db_error.php');
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err_msg = "Email Not Valid<br>";
    include('../database/db_error.php');
  } elseif (!preg_match("/[a-zA-Z]{0,30}$/", $password)) {
    $err_msg = "Password Not Valid<br>";
    include('../database/db_error.php');
  } else {
    $query1 = 'INSERT INTO student_reg(student_id, first_name, last_name, email, password) VALUES (:student_id, :first_name, :last_name, :email, :password)';
    $stm = $db->prepare($query1);
    $stm->bindValue(':student_id', null, PDO::PARAM_INT);
    $stm->bindValue(':first_name', $first_name);
    $stm->bindValue(':last_name', $last_name);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':password', $password);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
      print_r($stm->errorInfo()[2]);
    }

    $query2 = 'SELECT * FROM student_reg';
    $stm = $db->prepare($query2);
    $stm->execute();
    $students = $stm->fetchAll();
    $stm->closeCursor();

    $pass_1 = -1;
    $pass_2 = -1;
    $pass_3 = -1;
    $db_id = "";
    foreach ($students as $std) {
      $db_id = $std['student_id'];
      $db_first_name = $std['first_name'];
      $db_last_name = $std['last_name'];
      $db_password = $std['password'];

      $pass_1 = strcmp($db_first_name, $first_name);
      $pass_2 = strcmp($db_last_name, $last_name);
      $pass_3 = strcmp($db_password, $password);

      echo "$pass_1" .  " $pass_2" .  " $pass_3<br>";
      if ($pass_1==0 && $pass_2==0 && $pass_3==0) {
        break;
      }
    }

    $query3 = 'INSERT INTO student_details(std_details_id, address, phone, semester, student_id) VALUES (:std_details_id, :address, :phone, :semester, :student_id)';
    $stm = $db->prepare($query3);
    $stm->bindValue(':std_details_id', null, PDO::PARAM_INT);
    $stm->bindValue(':address', "");
    $stm->bindValue(':phone', "");
    $stm->bindValue(':semester', "");
    $stm->bindValue(':student_id', $db_id);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
      print_r($stm->errorInfo()[2]);
    }

    if ($pass_1==0 && $pass_2==0 && $pass_3==0) {
      session_start();
      $_SESSION['student_id'] = $db_id;
      header("Location: student_index/student_index.php");
    } else {
      header("Location: student_register.php");
    }
  }
}
?>
