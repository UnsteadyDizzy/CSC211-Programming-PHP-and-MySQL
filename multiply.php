<!-- multiply.php -->

<title>Multiply Numbers</title>
<?php

ini_set('display_errors', 0);
 
include('header.html'); // Include the header.

?>
<p> This is a multiplication calculator!
<h3> Enter the two numbers that you would like to multiply: </h3>

<form action="multiply.php" method="post">

	<p>First Number: <input type="number" name="num1" size="20"></p>
	<p>Second Number: <input type="number" name="num2" size="20"></p>
	<input type="submit" name="calculate" value="Calculate" class="button" ></input>
	
	<hr>
	
	<h3> Results: </h3>
</form>

<?php

// User inputs:
$num1 = intval($_POST['num1']);
$num2 = intval($_POST['num2']);

function multiplyNumbers($num1, $num2) {
	// This function multiplies the two numbers given by the user.
	if (is_int($num1) && is_int($num2)){
		print "<p> Your input: $num1 and $num2 <br>";
		
		$product = $num1 * $num2;
		
		print "Your result is: $product </p>";
	}
	else {
		print "Enter valid numbers.";
	}
	
}

if(array_key_exists('calculate', $_POST)) {
	multiplyNumbers($num1, $num2);
}

// If the button is clicked, run the function.
include('footer.html'); // Include the footer.

?>
