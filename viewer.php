<?php
session_start();
$username = $_SESSION['username'];
$filename = $_GET['filename'];
$filesArray = scandir($username);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename.";
	exit;
}
for($i=2; $i<count($filesArray); $i++){
	$real = htmlentities($filesArray[$i]);
	if ($filename == $real) {
		$full_path = sprintf("%s/%s", $username, $filename);
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mime = $finfo->file($full_path);
		header("Content-Type: ".$mime);
		readfile($full_path);
		exit;
		
	}
}
header("Location: fileNotFound.html");
exit;
?>