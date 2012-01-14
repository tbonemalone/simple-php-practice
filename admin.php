<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Simple Blog</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
</head>
<body>
	<h1>Simple Blog Applications</h1>	
	
	<form action="inc/update.inc.php" method="post">
		<fieldset>
			<legend>New Entry Submission</legend>
			<label for="title">
				<input type="text" name="title" maxlength="150">
			</label>
			<label for="entry">
				<textarea name="entry" cols="45" rows="10"></textarea>
			</label>
			<input type="submit" value="Save Entry" name="submit">
			<input type="submit" value="Cancel" name="submit">
		</fieldset>
	</form>
	
</body>
</html>