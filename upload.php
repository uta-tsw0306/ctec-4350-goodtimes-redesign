<link rel="stylesheet" href="style.css">

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

<div class="container home">
                    <div class="row">


                        <div class="col-xs-12 col-lg-6">
                            <form action="" method="post" enctype="multipart/form-data" name="uploadImage" id="uploadImage" class="upload-form">
        
            
                            <h1>Photos and Videos Upload</h1>
                            <label for="media_type">Media Type:</label>
                            <input class = "width20" type="radio" id="media_photo" name="media_type" value="1">Photo&emsp;
                            
                            <input class = "width20" type="radio" id="media_video" name="media_type" value="2" >Video
                            
                            <div id="formOutput">

                            </div>
                            
                            <div>
                            <label for="Name" id="NameLabel">Name: </label><br>
                            <input id="Name" type="text" name="Name" size="60">
                            </div>
                            
                            <div>
                            <label for="altTxt" id="altTxtLabel">Alt Text: </label><br>
                            <input id="altTxt" type="text" name="altTxt" size="60">
                            </div>
                            
                            <div>
                            <label for="caption" id="captionLabel">Caption: </label><br>
                            <input id="caption" type="text" name="caption" size="60">
                            </div>
                            
                            <div>
                            <label for="galleryBit">Does this go in the gallery?</label>
                            <input class = "width20" type="radio" id="galleryBit" name="galleryBit" value="0">No&emsp;<input class = "width20" type="radio" id="galleryBit" name="galleryBit" value="1" >Yes&emsp;    
                            </div>
                            
                            <div>
                            <label for="URL" id="URLLabel">URL (for youtube videos): </label>
                            <input id="URL" type="text" name="URL" size="50">
                            </div>
                            
                            <div>
                            <label for="image">Upload image:</label><br>
                            <input type="file" name="image" id="image" /> 
                            </div>
                            

                            <p>
                                <input type="submit" name="upload" id="upload" value="Upload" />
                            </p>
                            </form>
                        </div>

                    </div>
                </div>
            </main>
    

