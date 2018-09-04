<?php
	include_once 'loginserver.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
    <link rel="stylesheet" href="css/style-index.css">
</head>

<body>
	<div class="header">
		<h1>PURERA</h1>
	</div>

	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
			<form method="POST">
				<div class="login-form">
					<div class="control-group">
						<input name="user-name" type="text" class="login-field" value="" placeholder="username" id="login-name" required>
						<label class="login-field-icon fui-user" for="login-name"></label>
					</div>
					<div class="control-group">
						<input name="user-pass" type="password" class="login-field" value="" placeholder="password" id="login-pass" required>
						<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>
					<label class="errorLabel"><?php echo $error;?></label>											
					<input name="button" type="submit" class="btn btn-primary btn-large btn-block" value="login"/>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
