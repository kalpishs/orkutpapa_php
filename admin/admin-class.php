<?php
session_start();
require_once("../includes/OrkutPapaClass.php");

class adminclass extends orkutPapa
{
	function __construct()
	{
		include("../includes/connection.php");
	}
	public function redirect($url)
	{
		echo "<script language='javascript'>";
		echo "window.location = '$url'";
		echo "</script>";	
	}
	public function ToOption($dataArray)
	{
		for($i=0;$i<count($dataArray);$i++)
		{
			$showAsList .="<option value='".$dataArray[$i]['cid']."'>".$dataArray[$i]['cat_name']."</option>\n";
		}
		echo $showAsList;
	}
	public function admin_login($user_name,$password)
	{
		$Query = "SELECT * From `login` LIMIT 1";
		$adminQuery = mysql_query($Query) or die(mysql_error());
		$adminQueryresult = mysql_fetch_row($adminQuery) or die(mysql_error());
			if($adminQueryresult[0] != $user_name)
				{
					return "This User Doesn't Exist";
				}
			elseif($adminQueryresult[1] != $password)
				{
					return "Password not Match";
				}
			else
				{
					
					$_SESSION['user'] = $user_name;
					$_SESSION['password'] = $password; 
					session_register('user','password');
					$this->redirect("dashboard.php");
					
				}
				
	}
	public function totalcategory()
	{
		$query = "SELECT COUNT(*) as num FROM `category`";
		$queryResult = mysql_query($query) or die(mysql_error());
		$queryResultOutput = mysql_fetch_array($queryResult) or die(mysql_error());
		return $queryResultOutput['num'];
	}
	public function totalscraps()
	{
		$query = "SELECT COUNT(*) as num FROM `scraps`";
		$queryResult = mysql_query($query) or die(mysql_error());
		$queryResultOutput = mysql_fetch_array($queryResult) or die(mysql_error());
		return $queryResultOutput['num'];
	}
	public function totalgroup()
	{
		$query = "SELECT COUNT(DISTINCT `cat_group`) as num  FROM `category`";
		$queryResult = mysql_query($query) or die(mysql_error());
		$queryResultOutput = mysql_fetch_array($queryResult) or die(mysql_error());
		return $queryResultOutput['num'];
	}
	public function totalFeaturedcategory()
	{
		$query = "SELECT COUNT(*) as num FROM `category` WHERE `featured` LIKE 'Y'";
		$queryResult = mysql_query($query) or die(mysql_error());
		$queryResultOutput = mysql_fetch_array($queryResult) or die(mysql_error());
		return $queryResultOutput['num'];
	}
	public function totalscrapDescription($descriptionType)
	{
		$query = "SELECT COUNT(*) as num FROM `scraps` WHERE `type` LIKE '$descriptionType'";
		$queryResult = mysql_query($query) or die(mysql_error());
		$queryResultOutput = mysql_fetch_array($queryResult) or die(mysql_error());
		return $queryResultOutput['num'];
	}
	public function showfeaturedCategory()
	{
		$query = "SELECT `cat_name` FROM `category` WHERE `featured` LIKE 'Y'";
		$queryresult = mysql_query($query) or die(mysql_error());
		$i=0;
		while($queryresultOutput = mysql_fetch_row($queryresult))
			{
				$showfeaturedCategory[$i][] = $queryresultOutput[0];	
				$i++;
			}
		
		return $showfeaturedCategory;
		}
	public function logout()
	{
		unset($_SESSION['user']);
		unset($_SESSION['password']);
		header('Location:index.php');
	}
	public function populateCate()
	{
		$populatecateQuery = "SELECT `cat_name`,`cid`,`featured` FROM `category`";
		$populatecateQueryoutPut = mysql_query($populatecateQuery) or die(mysql_error());
		while($populatecateQueryReult = mysql_fetch_assoc($populatecateQueryoutPut))
		{
			$finalShowcate[] =$populatecateQueryReult;
		}
		return $finalShowcate;
	}
		
	public function getExtension($str)
	 {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 	}
	public function nameGen()
 	{
	return md5(time() * rand());	 
	}
	public function storeScrap($cid,$scrapName,$type)
	{
		$storeScrapQuery = "INSERT INTO `scraps`(`cid`,`name`,`type`) values('$cid','$scrapName','$type')";
		$storeScrapQueryoutput = mysql_query($storeScrapQuery) or die(mysql_error());
		
	}
	public function updateFeaturedCate($arr)
	{
		
		for($i=0;$i<count($arr);$i++)
		{
		 mysql_query("UPDATE `category` SET `featured`='".$arr[$i]['result']."' WHERE `cid`=".$arr[$i]['cid']);
		}

		
	}
	
	
}
//$ob = new adminclass();
//$ob->updateFeaturedCate("abc.jpg");
//echo $result[2][0];
?>