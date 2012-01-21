<?php 
	include_once 'inc/db.inc.php';
	include_once 'inc/functions.inc.php';

	//open a db connection
	$db = new PDO(DB_INFO, DB_USER, DB_PASS);

	//check to see if entry id was passed
	$id = (isset($_GET['id'])) ? (int) $_GET['id'] : NULL;

	$e = retrieveEntries($db, $id);
		
	$fulldisp = array_pop($e);

	// Sanitize the entry data
	$e = sanitizeData($e);

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<h1>Simple Blog Application Index Page</h1>

	<div id="entries">
		<?php
			// if fulldisp flag is set show content
			if ($fulldisp==1) {
		?>
		<h2><?php echo $e['title'] ?></h2>
		<p>
			<?php echo $e['entry'] ?>
			<a href="./">Back to latest entries</a>
		</p>
		<?php
			}  // end the if statement
			// if the full display flag is set to 0, format linked entry titles
			else {
				// loop through each entry
				foreach ($e as $entry) {
			?>
				<p>
					<a href="?id=<?php echo $entry['id'] ?>">
						<?php echo $entry['title'] ?>
					</a>
				</p>
		<?php
				} // end foreach
			} // end else
		?>


		<p class="backlink">
			<a href="./admin.php">Post a New Entry</a>
		</p>
	</div>

</body>
</html>