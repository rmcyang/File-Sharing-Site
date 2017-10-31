<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>File Uploader</title>
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
<form action="filesList.php" method="GET">
	<input type="submit" value="Files List" />
</form>
</p>
<?php
session_start();
$username = $_SESSION['username'];
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename.";
	exit;
}

$full_path = sprintf("%s/%s", $username, $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	echo "The file is successfully uploaded.";
	exit;
}else{
	echo "Uploading failed.";
	exit;
}
?>
</div></body>
</html>