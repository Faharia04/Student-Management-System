<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/css-admin/styles_admin_login.css">
  </head>
  <body>
    <div class="wrapper">
    	<div class="admin_login">
    		<div class="title">
          <label>Admin Login</label>
        </div>

    		<form action="admin_login_db.php" method="post">
    			<div class="form_wrap">

    				<div class="input_wrap">
    					<label>ID</label>
    					<input type="text" name="admin_id">
    				</div>

    				<div class="input_wrap">
    					<label>Password</label>
    					<input type="text" name="password">
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
