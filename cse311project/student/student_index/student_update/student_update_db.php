<?php session_start(); ?>
<?php require_once('../../../database/db_connect.php'); ?>
<?php
$student_id = $_SESSION['student_id'];

if(isset($_POST['btn-update-name'])) {
  $first_name = trim($_POST["first_name"]);
  $last_name = trim($_POST["last_name"]);

  if($first_name == null || $last_name == null) {
    $err_msg = "All Values Not Entered<br>";
    include('../../../database/db_error.php');
  } elseif (!preg_match("/[a-zA-Z]{3,30}$/", $first_name)) {
    $err_msg = "First Name Not Valid<br>";
    include('../../../database/db_error.php');
  } elseif (!preg_match("/[a-zA-Z]{3,30}$/", $last_name)) {
    $err_msg = "Last Name Not Valid<br>";
    include('../../../database/db_error.php');
  } else {
    $query = 'UPDATE student_reg SET first_name = :first_name, last_name = :last_name WHERE student_id = :student_id';

    $stm = $db->prepare($query);
    $stm->bindValue(':first_name', $first_name);
    $stm->bindValue(':last_name', $last_name);
    $stm->bindValue(':student_id', $student_id);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
      print_r($stm->errorInfo()[2]);
    }
    header("Location: ../student_profile.php");
  }
}

if(isset($_POST['btn-update-email'])) {
  $email = trim($_POST["email"]);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err_msg = "Email Not Valid<br>";
    include('../../../database/db_error.php');
  } else {
    $query = 'UPDATE student_reg SET email = :email WHERE student_id = :student_id';

    $stm = $db->prepare($query);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':student_id', $student_id);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
      print_r($stm->errorInfo()[2]);
    }
    header("Location: ../student_profile.php");
  }
}

if(isset($_POST['btn-update-address'])) {
  $address = trim($_POST["address"]);

  if (!preg_match("/[a-zA-Z0-9 ,#'\/.]{0,200}$/", $address)) {
    $err_msg = "Address Not Valid<br>";
    include('../../../database/db_error.php');
  } else {
    $query = 'UPDATE student_details SET address = :address WHERE student_id = :student_id';

    $stm = $db->prepare($query);
    $stm->bindValue(':address', $address);
    $stm->bindValue(':student_id', $student_id);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
      print_r($stm->errorInfo()[2]);
    }
    header("Location: ../student_profile.php");
  }
}

if(isset($_POST['btn-update-phone'])) {
  $phone = trim($_POST["phone"]);

  if (!preg_match("/[0-9]{0,11}$/", $phone)) {
    $err_msg = "Phone Number Not Valid<br>";
    include('../../../database/db_error.php');
  } else {
    $query = 'UPDATE student_details SET phone = :phone WHERE student_id = :student_id';

    $stm = $db->prepare($query);
    $stm->bindValue(':phone', $phone);
    $stm->bindValue(':student_id', $student_id);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
      print_r($stm->errorInfo()[2]);
    }
    header("Location: ../student_profile.php");
  }
}

if(isset($_POST['btn-update-password'])) {
  $password = trim($_POST["password"]);

  if (!preg_match("/[a-zA-Z0-9]{0,30}$/", $password)) {
    $err_msg = "Password Not Valid<br>";
    include('../../../database/db_error.php');
  } else {
    $query = 'UPDATE student_reg SET password = :password WHERE student_id = :student_id';

    $stm = $db->prepare($query);
    $stm->bindValue(':password', $password);
    $stm->bindValue(':student_id', $student_id);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
      print_r($stm->errorInfo()[2]);
    }
    header("Location: ../student_profile.php");
  }
}
?>
