<?php session_start(); ?>
<?php require_once('../../database/db_connect.php'); ?>
<?php
$student_id = $_SESSION['student_id'];

$query1 = 'SELECT * FROM student_reg';
$stm = $db->prepare($query1);
$stm->execute();
$student_reg = $stm->fetchAll();
$stm->closeCursor();

$std_info = array('student_id'=>'', 'first_name'=>'', 'last_name'=>'', 'email'=>'');

foreach ($student_reg as $std) {
  $db_id = $std['student_id'];
  $pass_1 = strcmp($db_id, $student_id);
  if ($pass_1==0) {
    $std_info['student_id'] = $std['student_id'];
    $std_info['first_name'] = $std['first_name'];
    $std_info['last_name'] = $std['last_name'];
    $std_info['email'] = $std['email'];
    break;
  }
}

$query2 = 'SELECT * FROM student_details WHERE student_id = :std_id';
$stm = $db->prepare($query2);
$stm->bindValue(':std_id', $db_id);
$stm->execute();
$student_details = $stm->fetchAll();
$stm->closeCursor();

$std_details = array('std_details_id'=>'', 'address'=>'', 'phone'=>'', 'semester'=>'', 'student_id'=>'');
foreach ($student_details as $std) {
    $std_details['std_details_id'] = $std['std_details_id'];
    $std_details['address'] = $std['address'];
    $std_details['phone'] = $std['phone'];
    $std_details['student_id'] = $std['student_id'];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Student Index</title>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href=" ../../css/css-student/styles_student_index.css">
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <h2>Student Portal</h2>
        <ul>
          <li>
            <a href="student_index.php"><i class="fas fa-home"></i>Home</a>
          </li>
          <li>
            <a href="student_profile.php"><i class="fas fa-user"></i>Profile</a>
          </li>
          <li>
            <a href="student_grades/student_grades.php"><i class="fas fa-graduation-cap"></i>Grades</a>
          </li>
          <li>
            <a href="student_courses/student_courses.php"><i class="fas fa-book-open"></i>Courses</a>
          </li>
        </ul>
        <div class="social_media">
          <a href=" ../../index/index.php"><i class="fas fa-power-off"></i></a>
        </div>
      </div>
        <div class="main_content">
          <div class="header">
            <h1 class="h1_welcome">Welcome</h1>
          </div>
            <div class="info">
              <div>
                <h2>
                  <?php
                    echo "Name: " . $std_info['first_name'] . " " . $std_info['last_name'] . "<br><br>";
                    echo "ID: " . $std_info['student_id'] . "<br><br>";
                    echo "Email: " . $std_info['email'] . "<br><br>";
                    echo "Address: " . $std_details['address'] . "<br><br>";
                    echo "Phone: " . $std_details['phone'] . "<br><br>";
                  ?>
                </h2>
              </div>
            </div>
        </div>
      </div>
  </body>
</html>
