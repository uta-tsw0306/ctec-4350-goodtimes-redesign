<?php
// acquire shared info from other files
include ("shared_session.php");

// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.inc.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

$PVID = ""; // place holder for product id information


//See if a product id is available from the client side. If yes, then retrieve the info from the database based on the product id.  If not, present the form.
if (isset($_GET['PVID'])) { // note that the spelling 'PVID' is based on the query string variable name

	// product id available, vaPVIDate the information, then compose a query accordingly to retrieve information.

	$PVID = intval($_GET['PVID']); // force all input into an integer.  If the input is a string or empty, it will be converted to 0.
	

	// vaPVIDate the product id -- check to see if it is greater than 0
		if ($PVID>0 ){
			//compose the query
			$sql = "DELETE FROM `PHOTOS_VIDEOS` WHERE PVID = ?"; // note that the spelling "PVID" is based on the field name in the database product table.

			$stmt = $conn->stmt_init();

			if ($stmt->prepare($sql)){

				$stmt->bind_param('i',$PVID);

				if ($stmt->execute()){ // $stmt->execute() will return true (successful) or false
					$output = "<p>Success!<br>The selected photo or video has been seccessfully deleted.</p>";
				} else {
					$output = "<div class='error'>The database operation to delete the record has been failed.  Please try again or contact the system administrator.</div>";
				}
				
			}
				
			
		} else {
			// product id <= 0. reset $PVID. prepare error message
			$PVID = "";
			// compose an error message
			$output = "<p><b>!</b> If you are expecting to delete an exiting item, there are some error occured in the process -- the product you selected is not recognizable. Please contact the webmaster.  Thank you.</p>";
		}
} else {
	// $_GET['PVID'] is not set, which means that no product id is provided
	$output = "<p><b>!</b> To manage product records, please follow the link below to visit the admin page.  Thank you. </p>";
}

?>

 <?php 
        $thisUID = $_SESSION['UID'];
        $thisUserAdmin = $_SESSION['Admin'];
        if($thisUserAdmin){echo $adminNav;}
        else if ($thisUID){echo $loggedInNav;}
        else{echo $basicNav;} ?>

<main class='flexboxContainer'>
    
    <div class="center">   
        <?= $output ?>
        
        <p>Back to the <a href='photo_video_list.php'>photo and video list page</a></p>
    </div>

</main>





<?php print $footer; ?>

</body>
</html>