<?php session_start(); ?>
<?php require_once('../../../database/db_connect.php'); ?>
<?php
$student_id = $_SESSION['student_id'];

$query1 = 'SELECT semester, course_id, grade FROM grades WHERE student_id=:student_id';
$stm = $db->prepare($query1);
$stm->bindValue(':student_id', $student_id);
$stm->execute();
$grades_tb = $stm->fetchAll();
$stm->closeCursor();

$query2 = 'SELECT * FROM courses';
$stm = $db->prepare($query2);
$stm->execute();
$course_tb = $stm->fetchAll();
$stm->closeCursor();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Student Index</title>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href=" ../../../css/css-student/styles_student_index.css">
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <h2>Student Portal</h2>
        <ul>
          <li>
            <a href="../student_index.php"><i class="fas fa-home"></i>Home</a>
          </li>
          <li>
            <a href="../student_profile.php"><i class="fas fa-user"></i>Profile</a>
          </li>
          <li>
            <a href="../student_grades/student_grades.php"><i class="fas fa-graduation-cap"></i>Grades</a>
          </li>
          <li>
            <a href="../student_courses/student_courses.php"><i class="fas fa-book-open"></i>Courses</a>
          </li>
        </ul>
        <div class="social_media">
          <a href=" ../../../index/index.php"><i class="fas fa-power-off"></i></a>
        </div>
      </div>
        <div class="main_content">
          <div class="header">
            <h1 class="h1_grades">Grades</h1>
          </div>
            <div class="info">
              <div>
                <h2>
                  <table>
                    <tr>
                      <td>Semester</td>
                      <td>Course</td>
                      <td>Grade</td>
                      <td>Delete</td>
                    </tr>
                    <?php foreach ($grades_tb as $grade): ?>
                      <tr>
                        <td><?php echo $grade['semester'] ?></td>
                        <td>
                          <?php
                          $output = "";
                          foreach ($course_tb as $course) {
                            if ($grade['course_id']==$course['course_id']) {
                              $output = $course['course_name'];
                              break;
                            }
                          }
                          echo $output;
                          ?>
                        </td>
                        <td><?php echo $grade['grade']; ?></td>
                        <td>
                          <button onclick="window.open('student_grades_delete.php?course_id=<?php echo $grade['course_id']; ?>', '_self')" <i class="fas fa-trash-alt"></i>
                          </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </h2>
              </div>
            </div>
        </div>
      </div>
  </body>
</html>
