<?php
class orkutPapa
{
	function __construct()
	{
		include("connection.php");
	}
	
	public function redirect($url)
	{
		echo "<script language='javascript'>";
		echo "window.location = '$url'";
		echo "</script>";	
	}
	public function RemoveStringpart($str)
	{
		$firstSpace = strrpos($str,"Scraps");
		if($firstSpace)
		{
		$finalString = substr($str,0,$firstSpace);
		}
		else
		{
			$finalString = $str;
		}
		return $finalString;
	}
	public function getcategoryBygroup($group_id)
	{
		$getCatQuery = "SELECT * FROM `category` WHERE `cat_group` LIKE '$group_id' ORDER BY `cat_name`";
		$getCatResult = mysql_query($getCatQuery) or die(mysql_error());
			$i = 0;
			while($getCatData = mysql_fetch_row($getCatResult))
			{	
				$getCat[$i][] = $getCatData[2];
				$getCat[$i][] = $getCatData[1];
				$i++;
			}
		return $getCat;
	}
	public function getcategoryBycid($cid)
	{
		
		$getCatQuery = "SELECT `cat_name` FROM `category` WHERE `cid` LIKE '$cid' LIMIT 1";
		$getCatResult = mysql_query($getCatQuery) or die(mysql_error());
			
			$getCatname = mysql_fetch_row($getCatResult) or die(mysql_error());
			$finalName = $this->RemoveStringpart($getCatname[0]);
			return $finalName;
	}
	public function getcategoryByslug($slug)
	{
		$getCatQuery = "SELECT `cat_name` FROM `category` WHERE `cat_slug` LIKE '$slug' LIMIT 1";
		$getCatResult = mysql_query($getCatQuery) or die(mysql_error());
		$getCatResultOutput = mysql_fetch_row($getCatResult) or die(mysql_error());
		return $getCatResultOutput[0];
	}
	public function CateToList($listArray)
	{
		$listOutput = "";
		$url = URL;
		for($i=0;$i<count($listArray);$i++)
		{
			$listOutput .= "<li> <a href='$url/category/".$listArray[$i][0]."/' title=".$listArray[$i][1].">" .$listArray[$i][1]. "</a> </li>\n";
		}
		echo $listOutput;
	}
	public function getsulgByCatname($categName)
	{
		$slugQuery = "SELECT `cat_slug` FROM `category` WHERE `cat_name` LIKE '$categName' LIMIT 1";
		$slugQueryOutput = mysql_query($slugQuery) or die(mysql_error());
		$slugQueryResult = mysql_fetch_row($slugQueryOutput);
		//echo $slugQueryResult[0];
		return $slugQueryResult[0];
		
	}
	public function getsulgByCid($categId)
	{
		$slugQuery = "SELECT `cat_slug` FROM `category` WHERE `cid` LIKE '$categId' LIMIT 1";
		$slugQueryOutput = mysql_query($slugQuery) or die(mysql_error());
		$slugQueryResult = mysql_fetch_row($slugQueryOutput);
		return $slugQueryResult[0];
		
	}
	public function getFeaturedCategories()
	{
		
	}
	
	public function getCatName($catId)
	{	
		
		$catidFondQuery = "SELECT `cid` FROM `category` WHERE `cat_slug` LIKE '$catId' LIMIT 1";
			$catidFoundResult = mysql_query($catidFondQuery) or die(mysql_error()); 
			$catidFound = mysql_fetch_row($catidFoundResult) or die(mysql_error());
			
		$catNameQuery = "SELECT `cat_name` FROM `category` WHERE `cid` = '$catidFound[0]'";
		$catNameResult = mysql_query($catNameQuery) or die(mysql_error());
		$catNameData = mysql_fetch_row($catNameResult);
		return $catNameData[0];
	}
	
	
	public function fetchDataByRecent($type,$start,$end)
	{
		$fetchDataByRecentQuery = "SELECT * FROM `$type` ORDER BY `id` DESC LIMIT $start,$end";
		$fetchDataByRecentResult = mysql_query($fetchDataByRecentQuery) or die(mysql_error());
		while($fetchDataByRecentData = mysql_fetch_assoc($fetchDataByRecentResult))
		{
			$output[] = $fetchDataByRecentData;			
		}
		
		return $output;
	}
	
	public function pagignation($searchId,$pageLink)
	{
			//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
				
			$catidFondQuery = "SELECT `cid` FROM `category` WHERE `cat_slug` LIKE '$searchId' LIMIT 1";
			$catidFoundResult = mysql_query($catidFondQuery) or die(mysql_error()); 
			$catidFound = mysql_fetch_row($catidFoundResult) or die(mysql_error());
			
			$query = "SELECT COUNT(*) as num FROM `scraps` WHERE `cid` LIKE '$catidFound[0]'";
	 

	$total_pages = mysql_fetch_array(mysql_query($query)) or die(mysql_error());
	$total_pages = $total_pages['num'];
	
	
	
	/* Setup vars for query. */
	$pageStr = "page/";
	$targetpage = $pageLink; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	

	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage$pageStr$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage$pageStr$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage$pageStr$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage$pageStr$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage1\">1</a>";
				$pagination.= "<a href=\"$targetpage2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage$pageStr$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage$pageStr$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage1\">1</a>";
				$pagination.= "<a href=\"$targetpage2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage$pageStr$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage$pageStr$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
	
	return $pagination;
	}
	
	
	public function fetchDataByCat($catId,$start,$end)
	{	
	
		$catidFondQuery = "SELECT `cid` FROM `category` WHERE `cat_slug` LIKE '$catId' LIMIT 1";
		$catidFoundResult = mysql_query($catidFondQuery) or die(mysql_error()); 
		$catidFound = mysql_fetch_row($catidFoundResult) or die(mysql_error());

		$fetchDataByCatQuery = "SELECT * FROM `scraps` WHERE `cid` = '$catidFound[0]' ORDER BY `sid` DESC LIMIT $start, $end";
		$fetchDataByCatResult = mysql_query($fetchDataByCatQuery) or die(mysql_error());
			while($fetchDataByCatData = mysql_fetch_assoc($fetchDataByCatResult))
		{
			$output[] = $fetchDataByCatData;	
		}
		
		return $output;	
	}
	public function blogUrl()
	{
		$blogUrl = URL."/";
		return $blogUrl;
	}
	public function showThumbBig()
	{
		$FeaturedCateQuery = "SELECT `cid`,`cat_name` FROM `category` WHERE `featured`='Y'";
		$FeaturedCateQueryoutput = mysql_query($FeaturedCateQuery) or die(mysql_error());
			while($FeaturedCateQueryResult = mysql_fetch_row($FeaturedCateQueryoutput))
			{
				$getFeaturedCate[] = $FeaturedCateQueryResult;
			}
		
		
		$randCatArrindex = array_rand($getFeaturedCate);
		
		$randCate[] = $getFeaturedCate[$randCatArrindex][0];
		$randCate[] = $getFeaturedCate[$randCatArrindex][1];
		$selectBigthumbQuery = "SELECT `name` FROM `scraps` WHERE `cid` LIKE '$randCate[0]'"; 
		$selectBigthumbQueryOutput = @mysql_query($selectBigthumbQuery) or die(mysql_error());	
			while($selectBigthumbQueryresult = @mysql_fetch_assoc($selectBigthumbQueryOutput))
			{ 
				
				$totalThumb[] = $selectBigthumbQueryresult;
			}
				$finalResult = @array_rand($totalThumb,2);
				$finalShowThumb[] = $totalThumb[$finalResult[0]];
				$finalShowThumb[] = $totalThumb[$finalResult[1]];
				$finalShowThumb[2]['name']=$randCate[1];

				return $finalShowThumb;
	
	}
	
	
	public function showThumbSmall()
	{
		
		$FeaturedCateQuery = "SELECT `cid` FROM `category` WHERE `featured`='Y'";
		$FeaturedCateQueryoutput = mysql_query($FeaturedCateQuery) or die(mysql_error());
			while($FeaturedCateQueryResult = mysql_fetch_row($FeaturedCateQueryoutput))
			{
				$getFeaturedCate[] = $FeaturedCateQueryResult;
			}
			
			$first = $getFeaturedCate[0][0];
		$getSmallThumbQuery ="SELECT `thumb_small`,`cid` FROM `scraps` WHERE `cid` LIKE '$first' ";
			for($i=1;$i<count($getFeaturedCate);$i++)
				{
					$getSmallThumbQuery .= " OR `cid` LIKE '".$getFeaturedCate[$i][0]."'";
				}
		$getSmallThumbQueryOutput = mysql_query($getSmallThumbQuery) or die(mysql_error());
			while($getSmallThumbQueryResult = mysql_fetch_assoc($getSmallThumbQueryOutput))
			{
				$getFinalSmallThumbb[] = $getSmallThumbQueryResult;
			}
		return $getFinalSmallThumbb;
			
	}
	
}

$ob = new orkutPapa();
$ob->showThumbBig();
?>