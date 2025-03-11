<!-- delete.php -->

<title>Delete Records</title>
<?php

include('header.html'); // Include the header.

// Connect and select:
$dbc = mysqli_connect('localhost', 'root', '12345', 'testingproject');

//Set the character set:
mysqli_set_charset($dbc, 'utf8');

if (isset($_GET['id']) && is_numeric($_GET['id']) ) { // Display the entry in a form:

	// Define the query.
	$query = "SELECT firstname, lastname, address, city, state, phonenumber, emailaddress FROM employees WHERE id={$_GET['id']}";
	if ($r = mysqli_query($dbc, $query)) { // Run the query.

		$row = mysqli_fetch_array($r); // Retrieve the information.
	
		// Make the form:
		print '<form action="delete.php" method="post">
		<p>Are you sure you want to delete this entry?</p>
		<p>' . $row['firstname'] . '<br>' . $row['lastname'] . '<br>' . $row['address'] . '<br>' . $row['city'] . '<br>' . $row['state'] . '<br>' . $row['phonenumber'] . '<br>' . $row['emailaddress'] . '<br>
		<input type="hidden" name="id" value="' . $_GET['id'] . '">
		<input type="submit" name="submit" value="Delete this Entry!"></p>
		</form>';

	} else { // Couldn't get the information.
		print '<p style="color: red;">Could not retrieve the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}

} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // Handle the form.

	// Define the query:
	$query = "DELETE FROM employees WHERE id={$_POST['id']} LIMIT 1";
	$r = mysqli_query($dbc, $query); // Execute the query.

	// Report on the result:
	if (mysqli_affected_rows($dbc) == 1) {
		print '<p>The entry has been deleted.</p>';
	} else {
		print '<p style="color: red;">Could not delete the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}

} else { // No ID received.
	print '<p style="color: red;">This page has been accessed in error.</p>';
} // End of main IF.

mysqli_close($dbc); // Close the connection.

include('footer.html'); // Include the footer.

?>
