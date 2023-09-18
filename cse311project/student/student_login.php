<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Login</title>
    <link rel="stylesheet" href=" ../css/css-student/styles_student_login.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="student_login">
    	  <div class="title">
          <label>Student Login</label>
        </div>

    		<form method="post" action="student_login_db.php">
    			<div class="form_wrap">

    				<div class="input_wrap">
    					<label>ID</label>
    					<input type="text" placeholder="ID" name="student_id">
    				</div>

    				<div class="input_wrap">
    					<label>Password</label>
    					<input type="text" placeholder="Password" name="password">
    				</div>

    				<div class="input_wrap">
    					<input type="submit" value="Login" class="login_btn" name="btn-login">
    				</div>

    			</div>
    		</form>

    	</div>
    </div>
  </body>
</html>
