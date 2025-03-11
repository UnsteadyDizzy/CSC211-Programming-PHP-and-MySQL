<!-- main.php -->

<title>Employee Form</title>
<?php

include('header.html'); // Include the header.

?>
<body>
<!-- main.html -->
<div><p>Enter the following information about the employee:</p>

<form action="view.php" method="post">
	
	<p>First Name: <input type="text" name="firstName" size="20"></p>
	
	<p>Last Name: <input type="text" name="lastName" size="20"></p>

	<p>Address: <input type="text" name="address" size="20"></p>

	<p>City: <input type="text" name="city" size="20"></p>
	
	<p>State: <input type="text" name="state" size="20"></p>

	<p>Phone Number: <input type="text" name="phone" size="20"></p>
	
	<p>Email Address: <input type="email" name="email" size="30"></p>

	<input type="submit" name="submit" value="Submit">

</form>

</div>
<?php

include('footer.html'); // Include the footer.

?>
</body>
</html>