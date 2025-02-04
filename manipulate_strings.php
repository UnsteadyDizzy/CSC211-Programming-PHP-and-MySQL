<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manipulating Strings</title>
</head>
<body>

<?php

// strcmp() is used to compare two strings. (case-sensitive)
echo "Testing strcmp(): <br>";

echo strcmp("Madison Kosters", "Madison Kosters"); 				// They are the same.
echo "<br>";
echo strcmp("Madison Kosters", "My name is Madison Kosters"); 	// The second string is bigger than the first string.
echo "<br>";
echo strcmp("Madison Kosters", "Madison"); 						// The second string is smaller than the first string.
echo "<br>";

// stristr() is used to find the occurence of a string in another string. (case-insensitive)
echo "Testing stristr(): <br>";

echo stristr("Madison Kosters", "Madison Kosters"); 	// This is true.
echo "<br>";
echo stristr("Madison Kosters", "MADISON"); 			// This is also true because case-insensitive.
echo "<br>";
echo stristr("Madison Kosters", "madisonkosters"); 		// This is false.
echo "<br>";

// strpos() is used to find the position of the first occurrence of a string in another string. (case-sensitive)
echo "Testing strpos(): <br>";

echo strpos("Madison Kosters", "o");			// This is true.
echo "<br>";
echo strpos("Madison Kosters", "kosters");		// This is false. (case-sensitive)
echo "<br>";
echo strpos("Madison Kosters", "Madison");		// This is true.
echo "<br>";

?>
</body>
</html>