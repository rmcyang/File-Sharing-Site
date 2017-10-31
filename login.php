<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Login</title>
<style type="text/css">
body{
	width: 760px; /* how wide to make your web page */
	background-color: teal; /* what color to make the background */
	margin: 0 auto;
	padding: 0;
	font:12px/16px Verdana, sans-serif; /* default font */
}
div#main{
	background-color: #FFF;
	margin: 0;
	padding: 10px;
}
</style>
</head>
<body><div id="main">
<h1>Welcome to the File Sharing System</h1>
<p>
<form name="login" action="loginCheck.php" method="GET">
	<label>Username: <input type="text" name="username" /></label>
	<input type="submit" value="Login" />
</form>
</p>
<p>
<form name="register" action="registerCheck.php" method="GET">
	<label>New user? Create username: <input type="text" name="username" /></label>
	<input type="submit" value="Register" />
</form>
</p>
</div></body>
</html>