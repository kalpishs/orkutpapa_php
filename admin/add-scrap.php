<?php
session_start();
include("includes/simpleimage.php");
$thumb = new SimpleImage();

require("admin-class.php");
$adminOb = new adminclass();

if(isset($_SESSION['user']))
{
	//do nothing
	
}
else
{
	$adminOb->redirect("index.php");
}

if(isset($_POST['submit']))
{
	
	$totalFile=count($_FILES);
	$categoryId = $_POST['category'];
	
	$catePath = $adminOb->getsulgByCid($categoryId);
	
	for($i=0;$i<$totalFile;$i++)
	{

		$getFilename = "myinput".$i;
		$scrapimg = $_FILES[$getFilename]['tmp_name']; 
		$scrapName= stripslashes($_FILES[$getFilename]['name']);
		$getExtension = $adminOb->getExtension($scrapName);
		$NewName = $adminOb->nameGen();
		$finalScrapName = $catePath."-".$NewName.".".$getExtension;
		$path = "../scrap/".$catePath;
		move_uploaded_file($scrapimg,$path.'/'.$finalScrapName);
			
			
			//for Scrap type
			 if($getExtension=="jpg"||$getExtension=="png")
			 {
				 $scrapType = "I";
				 
			 }
			 elseif($getExtension=='gif')
			 {
				 $scrapType = "G";

			 }
			 else
			 {
				 $scrapType = "F";
			 }
			
			//for generate thumbnails
			
			if($getExtension!="swf")
			{
			   $thumb->load($path."/".$finalScrapName);
			   $thumb->resize(250,250);
			   $thumb->save($path."/thumbnail/".$finalScrapName);
			}
			
			
			
		$adminOb->storeScrap($categoryId,$finalScrapName,$scrapType);
	}
}

$showfeaturedCategory = $adminOb->showfeaturedCategory();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="shortcut icon" href="../images/icon.ico"/>
<title>Orkut Papa-Home</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script type="application/javascript" language="javascript">
var counter = 1;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<li><label>Scrap " + (counter + 1) + "</label><input type='file' name='myinput" + counter + "'/></li>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>

</head>	
<body>
<div id="wrapper">
	<div id="header">
    	<div id="header-content">
	    <img src="../images/orkut-papa.jpg" alt="Orkut Papa, Orkut Scraps" width="200"/> 
    	</div>
    	</div>

	<div id="menu">
   	<?php include("includes/menu.php");?>
     
	</div>
	<div id="container">
    	<div id="login-form">
          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <ul>
          	<li>
          	  <label for="category">Category</label>
          	  <select name="category" id="category">
              <option selected="selected">Select Category</option>
              <?php echo $adminOb->ToOption($adminOb->populateCate()); ?>
       	      </select>
          	</li>
          	<li>
            <div id="dynamicInput"><label for="file0">Scrap 1</label><input name="myinput0" type="file" /></div></li>
            <li><label>&nbsp;</label><input type="button" value=" Add More " onClick="addInput('dynamicInput');"></li>
            <li><label>&nbsp;</label><input type="submit" name="submit" value="Go" />&nbsp;	<input type="reset" /></li>
          </ul>
          </form>
    	</div>
    
    
    
    </div>
  		
 	<div id="footer" align="center"><?php include("../includes/footer.php");?></div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
</body>
</html>