<?php
DEFINE('DB_USER', 'cse311_project');
DEFINE('DB_PASSWORD', 'CSE311');

$dsn = 'mysql:host=localhost;dbname=cse311_project';
try{
  $db = new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
  $err_msg = $e->getMessage();
  include('db_error.php');
  exit();
}
?>
