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
function confirmDel(title, PVID) {
// javascript function to ask for deletion confirmation

	url = "deletePhoto_Video.php?PVID="+PVID;
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
	$sql = "SELECT PV.PVID, PV.UID, PV.TID, PV.Added, PV.Name, PV.URL, PV.altTxt, PV.caption, PV.inGallery, U.Uname, U.notes 
FROM PHOTOS_VIDEOS as PV
NATURAL JOIN USER as U
ORDER BY PV.Added DESC";


	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->execute();
		$stmt->bind_result($PVID, $UID, $TID, $Added, $Name, $URL, $altTxt, $caption, $inGallery, $Uname, $notes);
	
		$tblRows = "";
		while($stmt->fetch()){
		    $tblRows = $tblRows."<tr>";
		    
		    if($TID == 1){
		        $tblRows = $tblRows."<td class='width20'><img src='$URL'></td>";
		    }
		    
		    if($TID == 2){
		        $tblRows = $tblRows."<td>$URL</td>";
		    }

			$tblRows = $tblRows."<td><a href='photo_video_form.php?PVID=$PVID'>Edit</a></td><td><a href='javascript:confirmDel(\"$Name\",$PVID)'>Delete</a></td>";
				
			$tblRows = $tblRows."<td>$PVID</td><td>$UID</td><td>$TID</td><td>$Added</td><td>$Name</td><td>$altTxt</td><td>$caption</td><td>$inGallery</td><td>$Uname</td><td>$notes</td>";
			
			$tblRows = $tblRows."</tr>";
		}
		
		$output = "
        <table class=\"styled-table\">\n
		<tr>
		<th></th>
		<th></th>
		
		<th></th><th>PVID</th><th>UID</th><th>TID</th><th>Added</th><th>Name</th><th>altTxt</th><th>caption</th><th>inGallery</th><th>Uname</th><th>notes</th>
		
	    </tr>\n".$tblRows.
		"</table>\n";
					
		$stmt->close();
	} else {

		$output = "Query to retrieve product information failed.";
	
	}

	$conn->close();
?>
	
		
<div class="page-title">
    <h2  class="title">Photo and Video List</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
        <?php echo $output ?>
        </div>
    </div>
</div>
</main>

<?php print $footer; ?>

</body>
</html>