<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <div id="login">
        <h2>Administrator Sign In</h2>
        <form method="POST" action="<?php echo base_url(); ?>auth/adminLogin">
			<p><label for="username">Username</label></p>
			<p><input type="username" id="username" name="username"></p> 
			<p><label for="password">Password</label></p>
			<p><input type="password" id="password" name="password"></p>
			<p><input type="submit" value="Sign In"></p>
        </form>
    </div> 
</body> 
</html>