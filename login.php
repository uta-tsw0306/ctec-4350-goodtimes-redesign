<?php
session_start();

if (isset($_GET['logout'])){
    $_SESSION['access'] = false;
    header("Location: index.php");
}

include("dbconn.inc.php"); // database connection 
//include("shared.php");
$conn = dbConnect();

// check to see if there's a form submission of user name and password
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $error = "";
    
	$sql = "SELECT `UID`, `Uname`, `password`, `admin`, `active` FROM `USER`";

	$stmt = $conn->stmt_init();
	
	$found = false;
	
	if (str_contains($username, ' ') || str_contains($password, ' ')) {
    $error = "Either your Username or Password contains spaces. This is not a valid login. ";
    }

	if ($stmt->prepare($sql)) {
		
		
		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($UID, $UserName, $Password, $Admin, $Active);

		/* fetch values */
		while ($stmt->fetch()) { // there should be only one record, therefore, no need for a while loop
		//echo ("UID: $UID, UN: $UserName, P: $Password, $ForumAcess, $Admin");
    		
            if($username == $UserName && $Password==$password && !$error && $Active){
                
    		    $_SESSION['access'] = true;
    			$_SESSION['UID'] = $UID;
    			$_SESSION['Admin'] = $Admin;
    			$found = true;
    			
            	//if(!$Admin){header("Location: admin_threadList.php");}
            	//else{header("Location: unapproved.php");}
            	header("Location: index.php");
            	exit;
    		}
        
            $UNfound = 0;
        
            if($username == $UserName){
               $UNfound = 1;
               
               if(!$Active){
		         $error .= "<br>This user has been deactivated<br>";
		        }
    
    		} 
    		 
    	
		}
		
		$message = "";
		
		if($UNfound == 0 && !$error){	$message .= "Your username is found but your password appears to be incorrect. Please try to fix it.<br>";}
		else{ $message .= "This login is not found<br>";}
		
		if($error){ $message .= $error;}
		

		
		$message .=  "If you need your username or password reset please contact our user support or come by a chorus meeting in person.";
		
	} else {
		print ("<div class='error'>Query failed</div>");
	}

    
    /*if ($username == "ctec" && $password == "4321") {
        // grant access
        $_SESSION['access'] = true;
    	header('Location: admin_productList.php');
    	exit;
        //$message = "Login Sucess";
    } else {
        // error message
        $message = "<div class='error'>The user name and password you provided are incorrect.  Please try again.</div>";
    }*/

} else if (isset($_POST['username']) || isset($_POST['password'])){
    $message = "<div class='error'>Please enter both the user name and password to log in.</div>";
    
}else {
    $message = "<div class=\"center\">Please use the form below to log in</div>";
    
}
?>    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/d56145ddde.js">
	</script>
	
	<body>

	<main>
	    
	<div class="container">
        <div class="row centerImage">
            <div class="col-xs-12 page-title">
                <h1 class="center_text">Log In</h1>
            </div>
            <div class="col-xs-12">
                <?= $message ?>
                <form action="" method="post">
                User name: <input type='text' name="username"> <br>
                Password: <input type='password' name="password">
                <br>
                <input type="submit" name="submit" value="Log in">        
                </form>
                <p>If you don't have an account please contact our webmaster.</p>
            </div>
        </div>
    </div>
    
    
    </main>
    </body>


