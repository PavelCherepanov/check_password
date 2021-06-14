<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Check password</title>
</head>
<body>
	<div style="text-align: center;">
		<h1>Check password</h1>
		<form method="post">
			<label for="pass">Enter phone or email</label>
			<br>
			<br>
			<input type="text" id="pass" placeholder="exaple@exaple.com" name="pass">
			<input type="submit" value="Check">
	</div>
	<hr>
	<style>
	</style>
</body>
</html>

<?php 
	$url = 'https://check.cybernews.com/chk/';
	$r = $_POST['pass'];
	print_r($_POST);
	echo "<br>";
	echo htmlspecialchars($_POST['pass'])."<br>";
	$params = array(
	    'lang' => 'en_US',
	    'e' => htmlspecialchars($_POST["pass"])
	);
	$result = file_get_contents($url, false, stream_context_create(array(
	    'http' => array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded; charset=utf-8',
	        'content' => http_build_query($params)
	    )
	)));
	
	
	if (strpos($result, "true")){
		echo "Oh no! Your data has been leaked :( ";
	} else{
		echo "We haven’t found your data among the leaked ones :)";
	}
	
?>