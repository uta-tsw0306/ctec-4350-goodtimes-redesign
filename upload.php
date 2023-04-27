<?php
	include ('shared.inc.php');
	include("dbconn.inc.php"); 
    include ("shared_session.php");
?>

<?php
$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF); 
$isAllowed = 0;


// supress the error/warning message.  Disable it to begin with so you see the error message provided by the php engine
error_reporting(0);
    
if (array_key_exists('upload', $_POST)) {
    $detectedType = exif_imagetype($_FILES['image']['tmp_name']);
    
    if (in_array($detectedType, $allowedTypes)) {
    $isAllowed = 1;
    }
    
  // define constant for upload folder
  define('UPLOAD_DIR', '/home/erm2015/CTEC4350.erm2015.uta.cloud/goodtimeChorus/images/');
  
  $filename = trim(addslashes($_FILES['image']['name']));
  $filename = str_replace(' ', '_', $filename);
  $_FILES['image']['name'] = $filename;
  
  if($isAllowed == 1){ 
      // move the file to the upload folder and rename it
      if (move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR.$filename)){
          // upload successful
          $message = "The selected file has been successfully uploaded.";
      } else {
          // something is wrong
          $message = "We have encountered issues in uploading this file.  Please try again later or contact the web master. ";
      }
  } else{
      echo("This type of file is not allowed.<br>");
  }
}
?>

<script>
function init(){
   var Mphoto = document.getElementById('media_photo');
   var Mvideo = document.getElementById('media_video');

  Mphoto.onclick = function(){
      if(Mphoto.checked == true){
          makeForm("photo is checked");
      }
  }

  Mvideo.onclick = function(){
       if(Mvideo.checked == true){
          makeForm("video is checked");
      }
      
  }
    
}

function makeForm(type){
    let formOutput = type;
    
    document.getElementById('formOutput').innerHTML = formOutput;

}


window.onload = init;
</script>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>File upload</title>
</head>

<body>
<?php 
    if(is_session_started() === FALSE || empty($_SESSION['access'])){echo $basicNav;}
    else if ($_SESSION['access'] == true){
        $thisUID = $_SESSION['UID'];
        $thisUserAdmin = $_SESSION['Admin'];
        if($thisUserAdmin){echo $adminNav;}
        else {echo $loggedInNav;}
    }else {echo $basicNav;}
    ?>

<div style="margin: 1em;"><?=$message?></div>
    
<form action="" method="post" enctype="multipart/form-data" name="uploadImage" id="uploadImage">
    <p>
        <h1>Photos and Videos Upload</h1>
        <label for="media_type">Media Type:</label>
        <input class = "width20" type="radio" id="media_photo" name="media_type" value="1">Photo&emsp;<input class = "width20" type="radio" id="media_video" name="media_type" value="2" >Video&emsp;
        
        <div id="formOutput">

        </div>
        
        <div>
		<label for="Name" id="NameLabel">Name: </label>
		<input id="Name" type="text" name="Name" size="100">
		</div>
		
		<div>
		<label for="altTxt" id="altTxtLabel">Alt Text: </label>
		<input id="altTxt" type="text" name="altTxt" size="100">
		</div>
		
		<div>
		<label for="caption" id="captionLabel">Caption: </label>
		<input id="caption" type="text" name="caption" size="100">
		</div>
        
        <div>
        <label for="galleryBit">Does this go in the gallery?</label>
        <input class = "width20" type="radio" id="galleryBit" name="galleryBit" value="0">No&emsp;<input class = "width20" type="radio" id="galleryBit" name="galleryBit" value="1" >Yes&emsp;    
        </div>
        
        <div>
		<label for="URL" id="URLLabel">URL (for youtube videos): </label>
		<input id="URL" type="text" name="URL" size="100">
		</div>
        
        <div>
		<label for="image">Upload image:</label>
        <input type="file" name="image" id="image" /> 
        </div>
        
    </p>
    <p>
        <input type="submit" name="upload" id="upload" value="Upload" />
    </p>
</form>



<pre>
<?php
// for debugging purpose
/*
if (array_key_exists('upload', $_POST)) {
  print_r($_FILES);
  } */
?>
</pre>
</body>
</html>