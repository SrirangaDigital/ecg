<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SPVGM</title>
<link href="style/reset.css" media="screen" rel="stylesheet">
<link href="style/indexstyle.css" media="screen" rel="stylesheet">

<script src="js/prototype.js"></script>
<script src="js/scriptaculous.js?load=effects,builder"></script>
<script src="js/lightbox.js"></script>
</head>
<?php 
//Create Database
include("connect.php");
	$Connection=mysqli_connect($host, $usr,$pwd, $db);
$ArtistId=$_GET['ArtistId'];
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
				<span class="subtitle"><a href="Yearwise.php?year=2015" >2015 Program List</a></span><br />
			</p>
			
<?php 
mysqli_set_charset($Connection, "utf8");
$result=mysqli_query($Connection,"select Event_Id,Date_Format(EventDate,'%d-%b-%Y'),Time,Artist,Miscellaneous,Photos,Date_Format(EventDate,'%Y'),DAYNAME(EventDate) FROM Event WHERE Event_Id = '$ArtistId'");
$array=mysqli_fetch_row($result);

$ArtistString="";

	
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
				$ArtistString.= "<span class=\"name\" ><a href=\"ArtistDetails.php?ArtisiName=".$ColonSplit[1]."\">".$ColonSplit[1]."</a></span>"."&nbsp&mdash;&nbsp".$ColonSplit[3]."<br>";
			}
		}
	}
	else
	{
		$ColonSplit = split(":", $SemicolonSplit[0]);
		$ArtistString= $ColonSplit[1]."-"."         ".$ColonSplit[3];
	}
}
	$array[1].="<br>".$array[7]."<br>".$array[2];
?>
		</div>
		<div class= "about_index_program">

			<p class="title">
					<?php echo "<br>8th cross Ganesha Music Festival : $array[6]<br>"; ?>
			</p> <br>
			<table>
				<tr><td class="left">Date</td><td>Program Details</td></tr>
				<?php echo "<tr><td align=center>".$array[1]."<br> </td><td align=left> $ArtistString $array[4]</td></tr>"; ?>
			</table>
<div class="gallery"> 
	<?php
		$SemicolonSplit=split(";", $array[5]);
		foreach($SemicolonSplit as $PhotoList)
		{
			if(!empty($PhotoList))
			{
				$result1=mysqli_query($Connection,"select * from Photos where PhotoId = '$PhotoList'");
				$array1=mysqli_fetch_row($result1);
				echo 	"<div class=\"imggallery\"><a href='gallery/main/".$PhotoList.".JPG' rel='lightbox[gallery]' title=\"$array1[1]\"><img src=\"gallery/thumb/".$PhotoList.".JPG\" alt=\"image\" title=\"\" ></a></div>";
			}
		}

	?>		
</div>
		</div>
			<div class="search">
				<form method="post" action="searchartist.php">
					<input class="search_field" type="text" name="search" value="Search for an artist" onclick="if(this.value=='Search for an artist') this.value='';" onblur="if(this.value=='')this.value='Search for an artist';">
					<input type="submit" class="button" value="" >
				</form>
			</div>
		

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

</body>

</html>
