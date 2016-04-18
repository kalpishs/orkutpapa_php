<?php
require("admin-class.php");
$admonOb = new adminclass();
echo $_SESSION['user'];
if(isset($_POST['submit']))
{
	
	$loginResult = $admonOb->admin_login($_POST['name'],$_POST['password']);
		if($loginResult)
		{?>
			<script type="text/javascript" language="javascript">
			alert("<?=$loginResult; ?>");
			</script>
		<?php }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="shortcut icon" href="../images/icon.ico"/>
<title>Orkut Papa-Home</title>
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<div id="header-content">
	    <img src="../images/orkut-papa.jpg" alt="Orkut Papa, Orkut Scraps" width="200"/> 
    	</div>
   	</div>
    
	<div id="menu">Welcome to Orkut Papa</div>
    
	<div id="container">
        <div id="login-form">
          <form id="form1" name="form1" method="post" >
          <ul>
          	<li>
              <label for="name">User Name</label>
              <input type="text" name="name" id="name" />
            </li>
          	<li>
          	  <label for="password">Password</label>
          	  <input type="password" name="password" id="password" />
          	</li>
          	<li>
          	  <label for="submit">&nbsp;</label>
          	  <input type="submit" name="submit" id="submit" value="submit" />
          	  <input type="reset" name="reset" id="reset" value="reset" />
          	</li>
          
          </ul>
          </form>
        </div>
    
    
    
    </div>
  		
 	<div id="footer" align="center"><?php include("../includes/footer.php")?></div>
</div>
</body>
</html>