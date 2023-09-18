<?php require_once('../database/db_connect.php'); ?>
<?php

$query1 = 'SELECT * FROM student_reg RG INNER JOIN student_details SD ON RG.student_id = SD.student_id';
$stm = $db->prepare($query1);
$stm->execute();
$student_reg = $stm->fetchAll();
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
            <h1 class="h1_welcome">Welcome</h1>
          </div>
            <div class="info">
              <div>
                <h2>
                  <table>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($student_reg as $reg): ?>
                        <tr>
                          <td><?php echo $reg['student_id']; ?></td>
                          <td><?php echo $reg['first_name'] . " " . $reg['last_name']; ?></td>
                          <td><?php echo $reg['email']; ?></td>
                          <td><?php echo $reg['phone']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </h2>
              </div>
            </div>
        </div>
      </div>
  </body>
</html>
