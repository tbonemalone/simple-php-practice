
<?php 
// this script has the logic to determine if input should be saved.
// and then save to the entries table.

	if ($_SERVER['REQUEST_METHOD'] == 'POST' 
	&& $_POST['submit'] == 'Save Entry' 
	&& !empty($_POST['title']) 
	&& !empty($_POST['entry'])) 
	{
		// Connect to the database
	    // Include database credentials and connect to the database
	    include_once 'db.inc.php';
	    $db = new PDO(DB_INFO, DB_USER, DB_PASS);

	    // Save the entry into the database
	    $sql = "INSERT INTO entries (title, entry) VALUES (?, ?)";
	    $stmt = $db->prepare($sql);
	    $stmt->execute(array($_POST['title'], $_POST['entry']));
	    $stmt->closeCursor();

	    // Get the ID of the entry we just saved from the database
	    $id_obj = $db->query("SELECT LAST_INSERT_ID()");
	    $id = $id_obj->fetch();
	    $id_obj->closeCursor();

	    // Send the user to the new entry
	    header('Location: ../index.php?id='.$id[0]);
	    exit;
	}

	// If both conditions aren't met, sends the user back to the main page
	else
	{
	    header('Location: ../admin.php');
	    exit;
	}



?>