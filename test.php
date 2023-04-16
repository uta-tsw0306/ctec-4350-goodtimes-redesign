<?php
include("dbconn.inc.php"); // database connection 
include ("shared_session.php");
include ('shared.inc.php');
//include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="Web Wise Media">

    <title>Home | Goodtimes Chorus</title>

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/403c2f4f58.js" crossorigin="anonymous"></script>


</head>

<body>
    <main>
        <?php 
        $thisUID = $_SESSION['UID'];
        $thisUserAdmin = $_SESSION['Admin'];
        if($thisUserAdmin){echo $adminNav;}
        else if ($thisUID){echo $loggedInNav;}
        else{echo $basicNav;} ?>
    <?php
    //send the query to the database and get results
        /* 
        The SQL query below is based on a (product) category table that I have:
            Table name: category
            Field names: CategoryID, CategoryName
    
    	 When modifying this script for your own use, you will have to edit this SQL query using your table name and field names. For the exercise, you are going to use this script to list all categories in your (link) category table.
        */
    	$sql = "SELECT `UID`, `Uname`, `password`, `admin` FROM `USER`";
    	
    	/* create a prepared statement */
    	$stmt = $conn->stmt_init();
    		
    	if ($stmt->prepare($sql)) {
    
    		/* execute statement */
    		$stmt->execute();
    
    		/* bind result variables */
    		$stmt->bind_result($UID, $Uname, $password, $admin);
    
    		
            print("<ul>");
    		/* fetch values */
    		while ($stmt->fetch()) {
    			print ("<li>$UID, $Uname, $password, $admin</li>");
    		}
    		print("</ul>");
    
    		/* close statement */
    		$stmt->close();
    
    	} else {
    		print ("query failed");
    	}
    
    /* close connection */
    $conn->close();
    	
    	
    ?>

    
    </main>
    <?php echo $footer; ?>

    <?php echo $js; ?>
</body>
</html>