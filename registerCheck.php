<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>RegisterCheck</title>
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
<form action="login.php" method="GET">
	<p>
		<input type="submit" value="Back" />
	</p>
</form>
<?php
$username = $_GET['username'];
if(!preg_match('/^[\w_\.\-]+$/', $username) ){
	echo "Invalid username, username should only be consisted by letters and numbers.";
	exit;
}
$existed = false;
$h = fopen("users.txt", "r");
while( !feof($h) ){
	$record = trim(fgets($h));
	if ($username == $record) {
		$existed = true;
	}
}
fclose($h);
if ($existed) {
	echo "Username already exists.";
	exit;
} else {
	file_put_contents("users.txt","\n".$username,FILE_APPEND);
	echo "Registered successfully.";
	mkdir("$username", 0777, true);
	exit;
}
?>
</div></body>
</html>