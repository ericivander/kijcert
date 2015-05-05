<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Menu</title>
</head>
<body>
	<h2>Home</h2>
    <?php
		/*
		echo anchor('home/user_signup', 'User Sign Up');
		echo '<br>';
		*/
		echo anchor('home/user_login', 'User Login');
		echo '<br>';
		echo anchor('home/admin_login', 'Administrator Login');
	?>
</body> 
</html>