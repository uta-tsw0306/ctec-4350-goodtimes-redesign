<?php
include ("shared_session.php");

// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.inc.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

/*if(!isset($_SESSION['access']) || $_SESSION['access'] != true) {
	header('Location: login.php');
	exit;
}*/


// make database connection
$conn = dbConnect();

?>

<script>
function confirmDel(title, UID) {
// javascript function to ask for deletion confirmation

	url = "deleteUser.php?UID="+UID;
	var agree = confirm("Delete this item: <" + title + "> ? ");
	if (agree) {
		// redirect to the deletion script
		location.href = url;
	}
	else {
		// do nothing
		return;
	}
}
</script>


<?php 
        $thisUID = $_SESSION['UID'];
        $thisUserAdmin = $_SESSION['Admin'];
        if($thisUserAdmin){echo $adminNav;}
        else if ($thisUID){echo $loggedInNav;}
        else{echo $basicNav;}
 ?>

<main>
<?php
$defaultSortingField = "LinkCategory.CID";
	if (isset($_GET['sort'])) {
		$sort = $_GET['sort'];
		if ($sort == "title"){
			$sort = "Links.AnchorText";
		} else {
			$sort = $defaultSortingField;
		}
	} else {
		// defaulty sorting field
		$sort = $defaultSortingField;
	}

	// the sorting order: ascending or descending
	if (isset($_GET['order'])){
		$order = $_GET['order'];
		if ($order == "d"){
			$order = " DESC";
		} else {
			$order = " ASC";
		}
	} else $order= "ASC";

// Retrieve the product & category info
	$sql = "SELECT `UID`, `Uname`, `password`, `admin` FROM `USER`";


	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->execute();
		$stmt->bind_result($UID, $UserName, $password, $admin);
	
		$tblRows = "";
		while($stmt->fetch()){

			$tblRows = $tblRows."<tr>";
				/*<td><a href='javascript:confirmDel(\"$Title_js\",$TID)'>Delete</a> </td>*/
				
			if($thisUserAdmin){$tblRows = $tblRows."<td><a href='editUserForm.php?UID=$UID'>Edit</a></td><td><a href='javascript:confirmDel(\"$UserName\",$UID)'>Delete</a></td>";}
		
		    else if($thisUID == $UID){$tblRows = $tblRows."<td><a href='editUserForm.php?UID=$UID'>Edit</a></td><td><a href='javascript:confirmDel(\"$UserName\",$UID)'>Delete</a></td>";}else{$tblRows = $tblRows."<td></td>
		    <td></td>";}
		
		
		//editUserForm.php
				
			$tblRows = $tblRows."<td>$UserName</td>";
			
		}
		
		$output = "
        <div class=\"title\">
		<h2  class=\"title\">User List</h2>
		</div>
        <table class=\"styled-table\">\n
		<tr>
		<th></th>
		<th></th>
		<th>UserName</th>
		
	    </tr>\n".$tblRows.
		"</table>\n";
					
		$stmt->close();
	} else {

		$output = "Query to retrieve product information failed.";
	
	}

	$conn->close();
?>
	
		

<div class='flexboxContainer'>
    <div>
        <?php echo $output ?>
    </div>
</div>
</main>

<?php print $footer; ?>

</body>
</html>