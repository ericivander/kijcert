<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Administrator Home</title>
</head>
<body>
	<h2>Administrator Home</h2>
    <?php
		echo anchor('admin/request', 'View Request');
		echo '<br>';
		echo anchor('auth/doLogout', 'Logout');
	?>
</body> 
</html>