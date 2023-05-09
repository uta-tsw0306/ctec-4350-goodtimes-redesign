<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.inc.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables
include ("shared_session.php");

?>

<html>
    <style>
	form div {margin: 10px; font-family: arial, sans-serif; vertical-align: text-top; clear: left; margin: 20px 5px;}

	form div label:first-of-type {display: inline-block; width: 250px; text-align: right; padding: 0px 5px; }
	
	.tips {border: 10px solid #013c6d; border-radius: 0 30px 30px 30px; padding: 30px; background-color: #dedddd; display: none; position: absolute;}

	#termsAndConditions {
		display: none;
	}

	.errMsg {display: block; background-color: white; color: #ff6600; font-size: 0.8em; padding: 2px; width: 500px; position: relative; left: 250px;}
  </style>
    
</html>

<script>
function init(){

    document.getElementById('UserName').addEventListener('focus', showTips, false);
	document.getElementById('UserName').addEventListener('blur', showTips, false);
	document.getElementById('Password').addEventListener('focus', showTips, false);
	document.getElementById('Password').addEventListener('blur', showTips, false);
	
	document.getElementById('UserName').addEventListener('keyup', getOp, false);
	
	document.getElementById('editUserForm').addEventListener('submit', process, false);
       
	}
	
function showTips(evt){	

		// get the id for the tip span; note the keyword "this" refers to the object on which the event occured -- the form input element that's on focus.
		var tipId = this.id+"Tips";
		
		// set the tip object
		var tip = document.getElementById(tipId);

		// place the tip based on corresponding form input's (vertical) position 
		var y = this.offsetTop;
		var x = this.offsetWidth + this.offsetLeft+ 50;
		tip.style.top = y+"px";
		tip.style.left = x+"px";


		// get the event object
		evt = (evt) ? evt:((window.event) ? event : null);

		// decide the value for the dispaly property of the tip and the background color of the form input based on the type of the event
		if (evt.type == "focus")
		{
			var displayValue = "block";
			var bgColor = "#95b9ff";
		} else {
			var displayValue = "none";
			var bgColor = "white";
		}

		tip.style.display = displayValue;
		this.style.backgroundColor = bgColor;
	}
	
function addErrorMessage(fieldId, msg){
	//console.log(msg);
	
	// highlight the lable
	document.getElementById(fieldId+"Label").style.color = "red";

	// check if an error message span is available
	if (document.getElementById(fieldId + "ErrMsg"))
	{
		// an error message span is already available, use it
		document.getElementById(fieldId + "ErrMsg").innerHTML = msg;
		document.getElementById(fieldId + "ErrMsg").style.display = "block";
	} else {
		
		// otherwise, create the error message span
		var messageSpan = document.createElement("span");
		messageSpan.className = "errMsg"; // set the CSS class to use
		messageSpan.id = fieldId + "ErrMsg"; // set the id
		messageSpan.innerHTML = msg;

		var inputLabel = document.getElementById(fieldId+'Label');
		inputLabel.parentNode.appendChild(messageSpan);
		
	}
	
}

function removeErrorMessage (fieldId){
	if (document.getElementById(fieldId + "ErrMsg"))
	{
		document.getElementById(fieldId+"Label").style.color = "black";
		document.getElementById(fieldId + "ErrMsg").style.display = "none";
	}
	
}

function process(evt){
	
	// data validation
	var err = 0;

	// get user input
	var UserName = document.getElementById('UserName').value;
	var Password = document.getElementById('Password').value;

	var UserNamePattern = /^[A-Z 0-9 \.\-']{6,20}$/i;
	var PasswordPattern = /^[A-Z 0-9 \.\-']{6,20}$/i;

    console.log("Username: " + UserNamePattern.test(UserName))
    console.log("Password: " + UserNamePattern.test(Password))
    
    
	if (UserNamePattern.test(UserName)) {
		removeErrorMessage('UserName');
	} else {
		addErrorMessage('UserName', 'The user name should be 6-20 characters usng only letter, numbers, dots, and/or dashes.');
		err ++;
	}
	
	if (UserNamePattern.test(Password)) {
		removeErrorMessage('Password');
	} else {
		addErrorMessage('Password', 'The password should be 6-20 characters usng only letter, numbers, dots, and/or dashes.');
		err ++;
	}

	// password


	



	// action
	var message = "";
	if (err == 0) // data are all valid
	{
        form.submit();
		
	} else {
		message = "There are errors.";
	}

	document.getElementById('response').innerHTML = message;

	// disable submit button


	// prevent form submission
	if (evt.preventDefault)
	{
		evt.preventDefault();
	} else {
		evt.returnValue = false;
	}

}

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

function getOp(evt){
	
    //console.log(document.getElementById('UserName').value);
	// get the selected value
	selectedItem = document.getElementById('UserName').value;
	

	if (selectedItem == "")
	{
		// clear the secondary list
		document.getElementById("detail").innerHTML = "";
		
		return false;// stop running the function here.
	}

	// set up XMLHttpRequest object 
	pageRequest = GetXmlHttpObject();
    if (pageRequest==null){
      alert ("Your browser does not support AJAX! Please visit ...");
      // how to still allow users to access resources? 
      return;  // stop the (function) code right here
    } 

	// monitor the change of readyState 
    pageRequest.addEventListener('readystatechange', function () {
		if (pageRequest.readyState == 4){// once it reaches 4 (request completed), process the server response
		var chContent = pageRequest.responseText;
		//insert server response to the div "list_level2".
		if((chContent == "That username is available!") == true){document.getElementById("submit").disabled = false; document.getElementById("submit").style.backgroundColor = "#970f36";}
		else {document.getElementById("submit").disabled = true; document.getElementById("submit").style.backgroundColor = "#dedddd";}
		
		document.getElementById("UserNameTips").innerHTML = "Your user name should contain 6-20 characters usng only letter, numbers, dots, and/or dashes. <br><br>" + chContent;
		}
	}, false);
	
	

	// set up the URL
	url = "username_data.php?q="+selectedItem;
	pageRequest.open("GET", url, true);
	pageRequest.send(null);
	//console.log(url);

}

function GetXmlHttpObject(){
	var xmlHttp=null;
	if (window.XMLHttpRequest) { // non-IE
	  xmlHttp = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); 
	}
	return xmlHttp;
    }

window.onload = init;
</script>

<?php



// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$UID = ""; // place holder for product id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.  `UID`, `UserName`, `Password`, `UserNameAdress`, `StreetAdress`, `City`, `State`, `Zip`, `UserImageURL`, `Admin`, `ParentID`, `ForumAcess`

$UserName="";
$Password="";
$Admin="";
$Notes="";

$errMsg = "";

// check to see if a product id available via the query string
if (isset($_GET['UID'])) { // note that the spelling 'UID' is based on the query string variable name.  When linking to this form (form.php), if a query string is attached, ex. form.php?UID=3 , then that information will be detected here and used below.

	$UID = intval($_GET['UID']); // get the integer value from $_GET['pid'] (ensure $pid contains an integer before use it for the query).  If $_GET['pid'] contains a string or is empty, intval will return zero.

	// validate the product id -- $pid should be greater than zero.
	if ($UID > 0){
			
		//compose a select query
		$sql = "SELECT `UID`, `Uname`, `password`, `notes`, `admin` FROM `USER` WHERE `UID` = ?"; // note that the spelling "lid" is based on the field name in my product table (database).
			
		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$UID);
			$stmt->execute();
				
			$stmt->bind_result($UID, $UserName, $Password, $Notes, $Admin); // bind the five pieces of information necessary for the form.
			
			$stmt->store_result();
				
			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$UID = ""; // reset $UID
			}

		} else {
			// reset $UID
			$UID = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, there are some error occured in the process -- the selected product is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}
		
		$stmt->close();
	} // close if(is_int($UID))
	
}


?>

<html>
<body>
<main class='flexboxContainer'>
    
    <?php 

        if(is_session_started() === FALSE || empty($_SESSION['access'])){echo $basicNav;}
        else if ($_SESSION['access'] == true){
            $thisUID = $_SESSION['UID'];
            $thisUserAdmin = $_SESSION['Admin'];
            if($thisUserAdmin){echo $adminNav;}
            else {echo $loggedInNav;}
        }else {echo $basicNav;}
        ?>

<div class="center">

<div class="page-title">
    <h1>Add a new user</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">

        <div id="detail"></div>
        
            <p><?= $errMsg ?></p>
        
        <form id="editUserForm" class="title" action="editUser_admin.php" method="POST">
        * Required
        	<input type="hidden" name="UID" value="<?=$UID?>">
        	<input type="hidden" name="Edited" value="<?(empty($UserName))?>">
        
             
        	    <div>
        		<label for="UserName" id="UserNameLabel">User Name*: </label>
        		<input id="UserName" type="text" name="UserName" size="100" value="<?= htmlentities($UserName) ?>">
        		</div>
        		<span class="tips" id="UserNameTips">Your user name should contain 6-20 characters usng only letter, numbers, dots, and/or dashes.</span>
        		
        		<div>
        		<label for="Password" id="PasswordLabel">Password*: </label>
        		<input id="Password" type="text" name="Password" size="100" value="<?= htmlentities($Password) ?>">
        		</div>
        		<span class="tips" id="PasswordTips">Password should contain 6-20 characters usng only letter, numbers, dots, and/or dashes.</span>
        		
        		<div>
        		<label for="Admin" id="AdminLabel">Admin Privileges: </label>
                <input type="radio" id="Admin" name="Admin" value="0" <?php if(!$Admin){echo("checked");} ?>>No&emsp;&emsp;<input class = "" type="radio" id="Admin" name="Admin" value="1" <?php if($Admin){echo("checked");} ?>>Yes&emsp;
        		</div>
        		
        		<div>
        		<label for="Notes" id="NotesLabel">Notes: </label>
        		<input id="Notes" type="text" name="Notes" size="100" value="<?= htmlentities($Notes) ?>">
        		</div>
        		
        		<div class = "center_text">
        		<td colspan=2><br><input type=submit id="submit" name="Submit" value="Submit New User Information">
                </div>
        
        </form>
        
        <div id="response">
        
        </div>
    



        </div>
    </div>
</div>

            <?php echo $footer; ?>

            <?php echo $js; ?>
</main>

</body>
</html>