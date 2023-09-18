<?php require_once('../database/db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Register</title>
    <link rel="stylesheet" href=" ../css/css-student/styles_student_register.css">
  </head>
  <body>
    <div class="wrapper">
	    <div class="registration_form">
		    <div class="title">
          <label>Registration Form</label>
		    </div>

		    <form method="post" action="student_register_db.php">
			  <div class="form_wrap">

			    <div class="input_grp">
				 	  <div class="input_wrap">
						<label>First Name</label>
						<input type="text" placeholder="First Name" name="first_name">
					  </div>

					  <div class="input_wrap">
						<label>Last Name</label>
						<input type="text" placeholder="Last Name" name="last_name">
				  	</div>
			    </div>

				  <div class="input_wrap">
					<label>Email</label>
					<input type="text" placeholder="Email" name="email">
				  </div>

				  <div class="input_wrap">
					<label>Password</label>
					<input type="text" placeholder="Password" name="password">
				  </div>

				  <div class="input_wrap">
					<input type="submit" value="Register Now" class="register_btn" name="btn-register">
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>
