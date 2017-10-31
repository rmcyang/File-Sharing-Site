<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Files List</title>
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
<?php
session_start();
$username = $_SESSION['username'];
$filesArray = scandir($username);

printf("<h1>Welcome to the File Sharing System, %s!</h1>",
	   htmlentities($username)
	   );
?>
<form action="logout.php" method="GET">
	<p>
		<input type="submit" value="Logout" />
	</p>
</form><br>
<h2>Upload a file:</h2>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form><br>
<h2>View a file:</h2>
<form action="viewer.php" method="GET">
	<p>
		<label>Enter the file name to view: <input type="text" name="filename" /></label> <input type="submit" value="View" />
	</p>
</form><br>
<h2>Delete a file:</h2>
<form action="deleter.php" method="GET">
	<p>
		<label>Enter the file name to delete: <input type="text" name="filename" /></label> <input type="submit" value="Delete" />
	</p>
</form><br>
<h2>Your files list:</h2>
<ul>
<?php
for($i=2; $i<count($filesArray); $i++){
	printf("<li>%s</li>",
		   htmlentities($filesArray[$i])
		   );
}
?>
</ul>
</div></body>
</html>