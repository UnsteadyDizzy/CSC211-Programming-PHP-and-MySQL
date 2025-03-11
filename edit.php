<!-- edit.php -->

<title>Edit Records</title>
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
		print '<form action="edit.php" method="post">
	<p>First Name: <input type="text" name="firstName" size="20" value="'. htmlentities($row['firstname']) . '"></p>
	<p>Last Name: <input type="text" name="lastName" size="20" value="'. htmlentities($row['lastname']) . '"></p>
	<p>Address: <input type="text" name="address" size="20" value="'. htmlentities($row['address']) . '"></p>
	<p>City: <input type="text" name="city" size="20" value="'. htmlentities($row['city']) . '"></p>
	<p>State: <input type="text" name="state" size="20" value="'. htmlentities($row['state']) . '"></p>
	<p>Phone Number: <input type="text" name="phone" size="20" value="'. htmlentities($row['phonenumber']) . '"></p>
	<p>Email Address: <input type="email" name="email" size="30" value="'. htmlentities($row['emailaddress']) . '"></p>
	<input type="hidden" name="id" value="' . $_GET['id'] . '">
	<input type="submit" name="submit" value="Update this Entry!">
	</form>';

	} else { // Couldn't get the information.
		print '<p style="color: red;">Could not retrieve the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}

} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // Handle the form.

	// Validate and secure the form data:
	$problem = FALSE;
	if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
		$firstName = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['firstName'])));
		$lastName = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['lastName'])));
		$address = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['address'])));
		$city = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['city'])));
		$state = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['state'])));
		$phone = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['phone'])));
		$email = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['email'])));
	} else {
		print '<p style="color: red;">Please submit both a title and an entry.</p>';
		$problem = TRUE;
	}

	if (!$problem) {

		// Define the query.
		$query = "UPDATE employees SET firstname='$firstName', lastname='$lastName', address='$address', city='$city', state='$state', phonenumber='$phone', emailaddress='$email' WHERE id={$_POST['id']}";
		$r = mysqli_query($dbc, $query); // Execute the query.

		// Report on the result:
		if (mysqli_affected_rows($dbc) == 1) {
			print '<p>The entry has been updated.</p>';
		} else {
			print '<p style="color: red;">Could not update the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}

	} // No problem!

} else { // No ID set.
	print '<p style="color: red;">This page has been accessed in error.</p>';
} // End of main IF.

mysqli_close($dbc); // Close the connection.

include('footer.html'); // Include the footer.

?>