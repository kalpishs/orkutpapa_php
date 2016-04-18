<?php
session_start();
require("admin-class.php");
$adminOb = new adminclass();
$getCate = $adminOb->populateCate();
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
	for($i=0;$i<count($getCate);$i++)
	{
		$a=$getCate[$i]['cid'];
		$arr[$i]['result']= $_POST[$a];
		$arr[$i]['cid']=$getCate[$i]['cid'];
	}
	echo $adminOb->updateFeaturedCate($arr);
	
	
	
}

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
    	<div id="login-form">
       	  <form id="form1" name="form1" method="post"  enctype="multipart/form-data">
			  <ul>
			  <?php
              for($i=0;$i<count($getCate);$i++)
              {
				  if($getCate[$i]['featured']=='Y')
				  { 
				  echo "<li><label class='labelfeat'>".$getCate[$i]['cat_name']."</label><input type='radio' name='".$getCate[$i]['cid']."' checked='checked' value='Y'/>YES &nbsp;&nbsp;<input type='radio' name='".$getCate[$i]['cid']."' value='N'/>No\n" ; 
				  }
				  else
				  {
					  echo "<li><label class='labelfeat'>".$getCate[$i]['cat_name']."</label><input type='radio' name='".$getCate[$i]['cid']."'".$checked." value='Y'/>YES &nbsp;&nbsp;<input type='radio' name='".$getCate[$i]['cid']."' checked='checked' value='N'/>No\n" ; 
				  }
				 
			  }?>
              <li><label class='labelfeat'>&nbsp;</label><input type="submit" name="submit" value="save" />&nbsp;<input type="reset" /> </li>
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