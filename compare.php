<!-- compare.php -->

<title>Compare Records</title>
<?php

ini_set('display_errors', 0);

include('header.html'); // Include the header.

?>
<p> Before you fill out the employee form, test to see how our system interprets your name!
<h3> Enter the two names that you would like to compare: </h3>

<form action="compare.php" method="post">

	<p>First Name: <input type="text" name="name1" size="20"></p>
	<p>Second Name: <input type="text" name="name2" size="20"></p>
	<input type="submit" name="compare" value="Compare" class="button" ></input>
	
	<hr>

	<h3> Results: </h3>
</form>

<?php

// User inputs:
$input1 = $_POST['name1'];
$input2 = $_POST['name2'];

function compareStrings($input1, $input2){
	// This function compares the two names given by the user to see if they are the same.
	print "<p> Your input: $input1 and $input2 <br>";
	
	// Formatting the string.
	$input1 = strtolower($input1);
	$input2 = strtolower($input2);
	
	print "How we see it: $input1 and $input2 <br>";
	
	if (strcmp(substr($input1, 0), substr($input2, 0)) !== 0) {
      echo 'The names are not equal. </p>';
	}
	else {
      echo 'The names are equal. </p>';
	}
}

// If the button is clicked, run the function.
if(array_key_exists('compare', $_POST)) {
	compareStrings($input1, $input2);
}

include('footer.html'); // Include the footer.

?>
