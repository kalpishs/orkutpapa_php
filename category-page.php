<?php

require("includes/OrkutPapaClass.php");
$orkutOb = new orkutPapa();
$pageType = "sms";
$catId = $_GET['slug'];

0
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?=URL."/";?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style2.css" type="text/css"/>
<link rel="shortcut icon" href="images/icon.ico"/>
<title>Orkut Papa-Home</title>
</head>
<body>
<div id="wrapper">
  <div id="header">
    <div id="header-content"> <img src="images/orkut-papa.jpg" alt="Orkut Papa, Orkut Scraps" width="200"/> </div>
    <div id="ad"> </div>
  </div>
  <div id="menu">
    <?php include("includes/menu.php"); ?>
  </div>
  <div id="container">
    <div id="right-container">
      <?php include("includes/cat_group.php"); ?>
    </div>
    <div id="middel-container">
      <div id="catTitle">
        <h1>
          <?php  echo $orkutOb->getCatName($catId); ?>
          / Text Messages</h1>
        <br />
        other text are here </div>
      <div id="ad2"></div>
      <?php
				$page = $_GET['page'];
			
			 if($page)
			 {
				$start = ($page - 1) * 10; 			//first item to display on this page
			 } 
			 else
			 {
				$start = 0; 
			 }
			 
			 $data = $orkutOb->fetchDataByCat($catId,$start,10);
			 if($data)
			 { 
				 for($i=0;$i<count($data);$i++)
				 { ?>
      	<div class="orkutdata">
        <?php if($data[$i]['type']== "F")
				 		  {?>
        <div class="hotlink" align="center">
          <textarea name="hotlink" cols="65" rows="3" onclick="focus();select();" style="border:1px solid #960d09;"><center><a href="<?php echo URL."/category/".$orkutOb->getcategoryByslug($catId)."/page/".$page ;?>"><object width="500" height="400"><param name="movie" value="scrap/<?php echo $data[$i]['name'];?> "><embed src="scrap/<?php echo $data[$i]['name'];?>" width="500" height="400"></embed></object></a><br /><a href="http://www.orkutpapa.com"> Visit Orkut Papa For Graphics & Flash Scraps</a></center>
          </textarea>
        </div>
        <div class="scrap" align="center"> <?php echo "<object width='500' height='400'>
								<param name='movie' value='scrap/".$data[$i]['name']."'>
								<embed src='scrap/".$data[$i]['name']."' width='500' height='400'>
								</embed>
								</object>";?> </div>
        <?php }
					   else
					   	{?>
        <div class="hotlink" align="center">
          <textarea name="hotlink" cols="65" rows="3" onclick="focus();select();" style="border:1px solid #960d09;"><center><a href="<?php echo URL."/category/".$orkutOb->getcategoryByslug($catId)."/page/".$page ;?>"><img src="scrap/<?php echo $data[$i]['name'];?>" alt="<?php echo $orkutOb->getcategoryByslug($catId)?>" border="0"/></a><br /><a href="http://www.orkutpapa.com">Visit Orkut Papa For Graphic $ Flash Scrap</a></center>
          </textarea>
        </div>
        <div class="scrap" align="center"><?php echo "<img src='scrap/".$data[$i]['name']."'style='border:5px solid #314d63;'>";?> </div>
        <?php } ?>
        <div class="scrap-description"> Category : <?php echo $orkutOb->getcategoryByslug($catId); ?>&nbsp;&nbsp;&nbsp;&nbsp;Submited Date : <?php echo $data[$i]['date']?> </div>
      </div>
      <?php }}?>
      <div id="page" style="display:block"> <?php echo $orkutOb->pagignation($catId,"category/".$catId."/"); ?> </div>
      <br />
    </div>
    <div id="left-container">
      <?php include("includes/right_cat_group.php"); ?>
    </div>
  </div>
  <div id="footer" align="center">
    <?php include("includes/footer.php");?>
  </div>
</div>
</body>
</html>