<?php
require("includes/OrkutPapaClass.php");
$orkutOb = new orkutPapa();
$Bigthumb = $orkutOb->showThumbBig(); 
//$Smallthumb = $orkutOb->showThumbSmall();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style2.css" type="text/css"/>
<link rel="shortcut icon" href="images/icon.ico"/>
<title>Orkut Papa-Home</title>
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<div id="header-content">
	    <img src="images/orkut-papa.jpg" alt="Orkut Papa, Orkut Scraps" width="200"/> 
    	</div>
    	<div id="ad"> </div>
	</div>

	<div id="menu"><?php include("includes/menu.php"); ?></div>
	<div id="container">
  		<div id="right-container">
  			<?php include("includes/cat_group.php"); ?>
    	</div>
		<div id="middel-container">
		        	<div id="ad2"></div>
            		<div id="home">
                   
						
											
					  <?php echo"<a href='".URL."/category/".$orkutOb->getsulgByCatname($Bigthumb[2]['name'])."/'><img src='scrap/".$orkutOb->getsulgByCatname($Bigthumb[2]['name'])."/thumbnail/".$Bigthumb[0]['name']."' width='250' height='250' /></a>"; ?>
                    &nbsp; 
                    <?php echo"<img src='scrap/".$orkutOb->getsulgByCatname($Bigthumb[2]['name'])."/thumbnail/".$Bigthumb[1]['name']."' width='250' height='250' />" ?>
                    <h1><?php echo "<a class='catnamebigThumb' href='".URL."/category/".$orkutOb->getsulgByCatname($Bigthumb[2]['name'])."/'>".$Bigthumb[2]['name']."</a>";?></h1>
                    </div>
                    <div id="small-thumb">
                    	<?php
						/*for($i=0;$i<count($Smallthumb);$i++)
						{
							$categId = $Smallthumb[$i]['cid'];
							$categName = $orkutOb->getcategoryBycid($categId);
							echo"<a href='".URL."/category/".$orkutOb->getsulgByCid($categId)."/'><div class='manage-smallthumb'><img src='scrap/thumb_cate/thumbnails/big/".$Smallthumb[$i]['thumb_small']."' width='120' height='120'  />";?><br/><?php echo $categName."</div></a>"; 
							
							
						}*/
						?>
                    
                    </div>
        </div>
  		<div id="left-container"><?php include("includes/right_cat_group.php"); ?></div>
 	<div id="footer" align="center"><?php include("includes/footer.php")?></div>
</div>
</body>
</html>