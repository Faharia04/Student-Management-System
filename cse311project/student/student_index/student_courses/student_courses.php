<?php require_once('../../../database/db_connect.php'); ?>
<?php
$query = 'SELECT * FROM courses';
$stm = $db->prepare($query);
$stm->execute();
$courses = $stm->fetchAll();
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
            <h1 class="h1_courses">Courses</h1>
          </div>
            <div class="info">
              <div>
                <h2>
                  <form method="post" action="student_courses_db.php">
                    <label>Select Course</label>
                    <div class="course_select_box">
                      <select name="course_info">
                        <?php foreach ($courses as $course): ?>
                          <option value="<?php echo $course['course_id'] ?>"><?php echo $course['course_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="input_grp">
            				 	<div class="input_wrap">
            					<label>Semester</label>
            					<input type="text" placeholder="Semester" name="semester">
            					</div>
            			 </div>
                    <div class="input_wrap">
             				 <input type="submit" value="Add" class="add_course_btn" name="btn-add-course">
             		  	</div>
                  </form>
                </h2>
              </div>
            </div>
        </div>
      </div>
  </body>
</html>
