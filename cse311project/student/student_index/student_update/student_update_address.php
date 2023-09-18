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
        <a href=" ../../index/index.php"><i class="fas fa-power-off"></i></a>
      </div>
    </div>
      <div class="main_content">
        <div class="header">
          <h1 class="h1_update">Update</h1>
        </div>
          <div class="info">
            <h2>
          	  <form method="post" action="student_update_db.php">
          	    <div class="form_wrap">

                   </script>
          			  <div class="input_grp">
          				 	<div class="input_wrap">
          					<label>Address</label>
          					<input type="text" placeholder="Address" name="address">
          					</div>

          			 </div>
          			 <div class="input_wrap">
          				 <input type="submit" value="Update" class="update_btn" name="btn-update-address">
          			</div>
          		</div>
          		</form>
           </h2>
        </div>
      </div>
    </div>
  </body>
</html>
