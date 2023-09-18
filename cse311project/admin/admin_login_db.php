<?php require_once('../database/db_connect.php'); ?>
<?php
if(isset($_POST['btn-login'])){
  $admin_id = trim($_POST["admin_id"]);
  $password = trim($_POST["password"]);


  $query = 'SELECT admin_id, password FROM admin';
  $stm = $db->prepare($query);
  $stm->execute();
  $admin_info = $stm->fetchAll();
  $stm->closeCursor();

  $pass_1 = -1;
  $pass_2 = -1;

  foreach ($admin_info as $admin) {
    $db_id = $admin['admin_id'];
    $db_password = $admin['password'];

    $pass_1 = strcmp($db_id, $admin_id);
    $pass_2 = strcmp($db_password, $password);

    if ($pass_1==0 && $pass_2==0) {
      break;
    }
  }

  if ($pass_1==0 && $pass_2==0) {
    header("Location: admin_index.php");
  } else {
    header("Location: admin_login.php");
  }
}
?>
