<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SPVGM</title>
<link href="style/reset.css" rel="stylesheet" type="text/css" />
<link href="style/indexstyle.css" rel="stylesheet" type="text/css" />
</head>

<?php 
	//Create Database
	$search="";
	include("connect.php");
	$Connection=mysqli_connect($host, $usr,$pwd, $db);
	$Artist=$_GET['ArtisiName'];
	if(isset($_POST['search']))
	{
		$search=$_POST['search'];
	}
	
	
	if($search!="" && $search!="Search for an artist")
		$Artist="";
	else
		{$Artist=$_GET['ArtisiName']; $search="";}
?>

<body>
<div class="page">
	<div class="header">
		<div class="mi2"><img src="images/mi2.png" alt="Instrument"/></div>

		<div class="mi2"><img src="images/mi2.png" alt="Instrument"/></div>
		<div class="mi4"><img src="images/mi4.png" alt="Instrument"/></div>
		<div class="title">Sri Prasanna Vidya Ganapati Mahotsava Charitable Trust&reg;</div>
		<div class="title_small">8th cross, V.V.Mohalla, Mysore-570002</div>
		<div class="logo"><img src="images/ganesha.png" alt="Ganesha"/></div>
		<div class="nav">
			<ul>
				<li><a href="../index.html">Home</a></li>

				<li><a href="news.html">News</a></li>
				<li><a class="active" href="program.html">Programs</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="contact.html">Contact</a></li>

			</ul>
		</div>
	</div>
	<div class="mainpage">
		<div class="widget">
			<img src="images/jubilee.png" alt="cover"/><br />
			<p>(1962 - 2012)<br />Golden jubilee celebrations<br />9th September 2013</p><br />
			<p>
				<span class="subtitle"><a href="Yearwise.php?year=2016" >2016 Program List</a></span><br />
			</p>
		</div>
<?php
	mysqli_set_charset($Connection, "utf8");
	if($search!="" && $search!= "Search for an artist"){
		$query = "select Event_Id,Date_Format(EventDate,'%d-%b-%Y'),Time,Artist,Miscellaneous,Photos,DAYNAME(EventDate) FROM Event where Artist like '%" . $search . "%'";
		$result=mysqli_query($Connection, $query);
	}

	else{
		$query = "select Event_Id,Date_Format(EventDate,'%d-%b-%Y'),Time,Artist,Miscellaneous,Photos,DAYNAME(EventDate) FROM Event WHERE Artist like '%" . $Artist . "%'";
		$result=mysqli_query($Connection, $query);
	}
?>
		<div class="about_index_program">
	
		<?php if($search!="" && $search!= "Search for an artist"): ?> <p class="search_result"><?php echo mysqli_num_rows($result); ?> number of detail(s) found:  <?php echo $search; ?>  </p> 
		<?php else: ?> <div class="title"><?php echo $Artist;?>'s Program Details</div> <br><?php endif; ?>
		
			<table>
			<tr><td class="left">Date</td><td>Program Details</td></tr>

<?php 
while($array=mysqli_fetch_row($result))
{
	$ArtistString="";
	$Gallery="";
	if($array[3]!=NULL)
	{
		$SemicolonSplit=split(";", $array[3]);
		if(count($SemicolonSplit)>2)
		{
			foreach($SemicolonSplit as $ArtDetails)
			{
				if(!empty($ArtDetails))
				{
					$ColonSplit = split(":", $ArtDetails);
					$ArtistName=$ColonSplit[1];
					$ArtistName=preg_replace('/ /','%20',$ArtistName);
					if($search!="" && $search!= "Search for an artist" && preg_match("/$search/i", $ColonSplit[1]))
					{
						$ArtistString.= "<span class=\"artist\" style=\"background-color:#FFDAB9\">".$ColonSplit[1]."&#160;&mdash;&#160;".$ColonSplit[3]."</span><br> ";
					}
					else if($ColonSplit[1]==$Artist)
					{
						$ArtistString.= "<span class=\"artist\" style=\"background-color:#FFDAB9\">".$ColonSplit[1]."&#160;&mdash;&#160;".$ColonSplit[3]."</span><br> ";
					}
					else
					{
						$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
					}
					
				}
			}
		}

		else
		{
			$ColonSplit = split(":", $SemicolonSplit[0]);
			$ArtistString= $ColonSplit[1]."-"."         ".$ColonSplit[3];
		}
	}
	
	if($array[5]!="")
	{
			$Gallery="<span class=\"gallery\" style=\"position:fixed top:10px;\"><a href=\"Photogallery.php?ArtistId=".$array[0]."\">Photos</a></span>";
	}
	
	// Spliting time and day string
	if($array[2]!=NULL)
	{
		$array[1].="<br>".$array[6]."<br>".$array[2];
	}
	else
	{
		$array[1].="<br>".$array[6];
	}
	echo "<tr><td align=center>".$array[1]."<br> $Gallery</td><td align=left> $ArtistString $array[4]</td></tr>";
}
?>
			</table>
		</div>
		<div class="search">
				<form method="post" action="searchartist.php">
					<input class="search_field" type="text" name="search" value="Search for an artist" onclick="if(this.value=='Search for an artist') this.value='';" onblur="if(this.value=='')this.value='Search for an artist';">
					<input type="submit" class="button" value="" >
				</form>
			</div>
	</div>
	<div class="footer">
		<div class="foot_box">
			<div class="left">
				<ul>
					<li><a href="#">Terms of Use</a></li>

					<li>|</li>
					<li><a href="#">Privacy Policy</a></li>
					<li>|</li>
					<li><a href="#">Contact us</a></li>
				</ul>
			</div>
			<div class="right">

				&copy;2011 SPVGM Charitable Trust, Mysore. All Rights Reserved
			</div>
		</div>
	</div>
</div>
</body>

</html>
