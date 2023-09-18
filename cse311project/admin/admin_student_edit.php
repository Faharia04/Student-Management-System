<?php require_once('../database/db_connect.php'); ?>
<?php
$student_id = $_GET['student_id'];
session_start();
$_SESSION['student_id'] = $student_id;

$query1 = 'SELECT * FROM student_reg RG INNER JOIN grades GD ON RG.student_id = GD.student_id WHERE RG.student_id=:student_id';
$stm = $db->prepare($query1);
$stm->bindValue(':student_id', $student_id);
$stm->execute();
$student_edit = $stm->fetchAll();
$stm->closeCursor();

$std_arr = array('first_name'=>'', 'last_name'=>'', 'student_id'=>'');
foreach ($student_edit as $reg) {
  $std_arr['first_name'] = $reg['first_name'];
  $std_arr['last_name'] = $reg['last_name'];
  $std_arr['student_id'] = $reg['student_id'];
  break;
}

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
  <link rel="stylesheet" href=" ../css/css-admin/styles_admin_index.css">
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <h2>Admin Portal</h2>
        <ul>
          <li>
            <a href="admin_index.php"><i class="fas fa-home"></i>Home</a>
          </li>
          <li>
            <a href="admin_student_details.php"><i class="fas fa-school"></i>Students</a>
          </li>
        </ul>
        <div class="social_media">
          <a href=" ../index/index.php"><i class="fas fa-power-off"></i></a>
        </div>
      </div>
        <div class="main_content">
          <div class="header">
            <h1 class="h1_welcome">Edit</h1>
          </div>
            <div class="info">
              <div>
                <h2>
                  <div>
                    <table>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $std_arr['first_name'] . ' ' . $std_arr['last_name']; ?></td>
                      </tr>
                      <tr>
                        <td>ID</td>
                        <td><?php echo $std_arr['student_id']; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div>
                    <table>
                      <thead>
                        <tr>
                          <th>Course ID</th>
                          <th>Course Name</th>
                          <th>Grade</th>
                          <th>Update Grade</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($student_edit as $reg): ?>
                          <tr>
                            <td>
                              <?php echo $reg['course_id']; ?>
                            </td>
                            <td>
                              <?php
                              $output = "";
                              foreach ($course_tb as $course) {
                                if ($reg['course_id']==$course['course_id']) {
                                  $output = $course['course_name'];
                                  break;
                                }
                              }
                              echo $output;
                              ?>
                            </td>
                            <td>
                              <?php echo $reg['grade']; ?>
                            </td>
                            <td>
                              <form method="post"
                              action="admin_student_edit_db.php?course_id=<?php echo $reg['course_id']; ?>">
                                <div class="form_wrap">
                                  <div class="input_wrap">
                                    <input type="text" placeholder="Grade" name="grade">
                                  </div>
                                  <div class="input_wrap">
                                    <input type="submit" value="Update" class="grade_btn" name="btn-grade">
                                  </div>
                                </div>
                              </form>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </h2>
              </div>
            </div>
        </div>
      </div>
  </body>
</html>
