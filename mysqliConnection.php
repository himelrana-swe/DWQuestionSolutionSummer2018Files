
<?php
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = 'yourdbpass';
	$dbname = 'yourdb';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

	if(! $conn ) {
		// If Database Connection Failed
		die('Could not connect: ' . mysqli_error());

	}
	// SQL Query for getting everyting from table
	$sql = 'SELECT * FROM tablename';

	// Executing Query with connection
	$result = mysqli_query($conn, $sql);

	// Checking if any data available in result
	if (mysqli_num_rows($result) > 0) {

		//Storing all available data into data variable
		$data = mysqli_fetch_assoc($result);

		// Printing data
		print_r($data);

	}else{
		// If no data available
		echo "No data available in this table!";
	}

	mysqli_close($conn);
?>

