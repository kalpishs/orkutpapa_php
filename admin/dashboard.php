<?php
session_start();
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
    	<div id="details">
        	
    		<?php include("includes/total-description.php");?>
    	</div>
        	<div class="details2">
            <span class="title">Featured Categories</span>
            <ul>
				<?php
				for($i=0;$i<count($showfeaturedCategory);$i++)
				{?>
                	<li><?php echo $showfeaturedCategory[$i][0] ?></li>
                    <?php }?>
 			</ul>
        	</div>
            <div class="details2">
            <span class="title">Other Details</span><br /><br />
			<span class="title">Total Admin Submited Scraps :</span>
            <br /><br />
			<span class="title">Total User Submited Scraps :</span>
            
            </div>
       
    </div>
  		
 	<div id="footer" align="center"><?php include("../includes/footer.php");?></div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
</body>
</html>