<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>User Home</title>
</head>
<body>
	<h2>User Home</h2>
    <?php
		echo anchor('user/request', 'Request Digital Certificate');
		echo '<br>';
		echo anchor('user/download', 'Download Digital Certificate');
		echo '<br>';
		echo anchor('auth/doLogout', 'Logout');
	?>
</body> 
</html>