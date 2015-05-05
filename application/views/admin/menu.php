<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
	<h2>Administrator Home</h2>
    <?php
		echo anchor('home/user_signup', 'View Request');
		echo '<br>';
		echo anchor('auth/doLogout', 'Logout');
	?>
</body> 
</html>