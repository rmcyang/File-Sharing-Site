<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Login Check</title>
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
<p>
<form action="login.php" method="GET">
	<input type="submit" value="Back" />
</form>
</p>
<?php
$username = $_GET['username'];
if(!preg_match('/^[\w_\.\-]+$/', $username) ){
	echo "Invalid username, username should only be consisted by letters and numbers.";
	exit;
}
$h = fopen("users.txt", "r");
while( !feof($h) ){
	$record = trim(fgets($h));
	if ($username == $record) {
		session_start();
		$_SESSION['username'] = $username;
		header("Location: filesList.php");
		exit;
	}
}
fclose($h);
echo "Username not existed.";
?>
</div></body>
</html>