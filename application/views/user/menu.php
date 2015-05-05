<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>User Home</title>
</head>
<body>
	<h2>User Home</h2>
    <?php
		echo anchor('user/generateCSR', 'Generate Certificate Signing Request and Request Digital Certificate');
		echo '<br>';
		echo anchor('user/listCSR', 'Download Certificate Signing Request');
		echo '<br>';
		/*
		echo anchor('user/request', 'Request Digital Certificate');
		echo '<br>';
		*/
		echo anchor('user/listCertificate', 'Download Digital Certificate');
		echo '<br>';
		echo anchor('auth/doLogout', 'Logout');
	?>
</body> 
</html>