<?php
include("dbconn.inc.php");
$conn = dbConnect();

$q=$_GET["q"];

//echo "q=$q";  // for debugging purpose

	

if ($q) // check if $q is a key in the $c array
{
	$sql = "SELECT `Uname` FROM `USER` WHERE `Uname` = ?";
    $found = 0;

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->bind_param('s',$q);
		$stmt->execute();
			
		$stmt->bind_result($UserName); // bind the five pieces of information necessary for the form.
		
		$stmt->store_result();
			
		// proceed only if a match is found -- there should be only one row returned in the result
		if($stmt->num_rows == 1){
			$stmt->fetch();
			$found = 1;
		} 
	
	} else {

		$response = "Query to retrieve product information failed.";
	
	}

	$conn->close();
	
	if($found){$response = "This username is taken.";}
	else{$response = "That username is available!";}

} else {

	$response = "To see courses, please select a subject from the list above.";

}

echo $response;

?>