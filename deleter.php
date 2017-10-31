<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Delete File</title>
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
$filename = $_GET['filename'];
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename.";
	exit;
}
$filePath = $username. "/". $filename;
if (!file_exists($filePath)) {
	header("Location: fileNotFound.html");
	exit;
}
if (unlink($filePath)) {
	echo "The file was deleted successfully.";
} else {
	echo "Fail to delete file, please try again.";
}
?>
</div></body>
</html>