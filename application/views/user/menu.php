<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
	<h2>User Home</h2>
    <?php
		echo anchor('', 'Request Digital Certificate');
		echo '<br>';
		echo anchor('', 'Download Digital Certificate');
		echo '<br>';
		echo anchor('auth/doLogout', 'Logout');
	?>
</body> 
</html>