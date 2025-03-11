<!-- view.php -->

<title>View Records</title>
<?php

include('header.html'); // Include the header.

?>

<form method="post">

<!-- add buttons to add, delete, or edit data in html --!>
<input type="submit" name="button1" class ="button" value="Display Contents of Database"/> 
<input type="submit" name="button2" class ="button" value="Display Directory"/> 

</form>

<?php

$dbc = mysqli_connect('localhost', 'root', '12345', 'testingproject');
mysqli_set_charset($dbc, 'utf8');


// Display contents of database.
function displayDatabase(){
	$dbc = mysqli_connect('localhost', 'root', '12345', 'testingproject');
	
	// Define the query:
	$query = 'SELECT * FROM employees ORDER BY id DESC';

	if ($r = mysqli_query($dbc, $query)) { // Run the query.

		// Retrieve and print every record:
		while ($row = mysqli_fetch_array($r)) {
			$field1name = $row["firstname"];
			$field2name = $row["lastname"];
			$field3name = $row["address"];
			$field4name = $row["city"];
			$field5name = $row["state"];
			$field6name = $row["phonenumber"];
			$field7name = $row["emailaddress"];
			$field8name = $row["id"];

			echo "
				<h3> $field8name </h3>
				<table>
					<tr> 
						<td>$field1name</td> 
						<td>$field2name</td> 
						<td>$field3name</td> 
						<td>$field4name</td> 
						<td>$field5name</td> 
						<td>$field6name</td> 
						<td>$field7name</td> 
					</tr>
				</table>
				<p> <a href=\"edit.php?id={$row['id']}\">Edit</a>
					<a href=\"delete.php?id={$row['id']}\">Delete</a>
				</p> ";
		}
	} 	
	else { // Query didn't run.
		print '<p style="color: red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}

}

$query1 = "CREATE TABLE employees (
			id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			firstname varchar(255),
			lastname varchar(255),
			address varchar(255),
			city varchar(255),
			state varchar(255),
			phonenumber varchar(255),
			emailaddress varchar(255))";

	try {
		@mysqli_query($dbc, "SELECT firstname FROM employees");
		
	}
	catch (exception $e) {
		@mysqli_query($dbc, $query1);
	}
	
	// Validate the form data:
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
		$problem = TRUE;
	}

	if (!$problem) {

		// Define the query:
		$query = "INSERT INTO employees (id, firstname, lastname, address, city, state, phonenumber, emailaddress) VALUES (0, '$firstName', '$lastName', '$address', '$city', '$state', '$phone', '$email')";

		// Execute the query:
		if (@mysqli_query($dbc, $query)) {
			print '<p>The employee has been added!</p>';
		} else {
			print '<p style="color: red;">Could not add the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}

		

	} // No problem!
	
	mysqli_close($dbc); // Close the connection.

// Display files in a directory.
function displayDirectory(){
	echo "All files in directory: <br> <ol>";
	$dir = "C:/xampp/htdocs/Final Project/";
	
	$a = scandir($dir);
	foreach ($a as $x){
		print_r("<li>$x <br></li>");
	}
	
	echo "</ol>";
}

if(array_key_exists('button1', $_POST)) {
	displayDatabase();
}
if(array_key_exists('button2', $_POST)) {
	displayDirectory();
}

include('footer.html'); // Include the footer.

?>


</body>
</html>