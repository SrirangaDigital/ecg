<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SPVGM</title>
<link href="style/reset.css" rel="stylesheet" >
<link href="style/indexstyle.css"  rel="stylesheet">
</head>

<?php 
	if(isset($_POST['search']))
	{
		$search=$_POST['search'];
	}
	if(isset($_GET['year']))
	{
		$search=$_GET['year'];
	}
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
				<span class="subtitle"><a href="Yearwise.php?year=2016">2016 Program List</a></span><br />
			</p>
			<p>
				<span class="subtitle"><a href="sketches.html" >Sketches of 2015 Programs</a></span><br />
			</p>
		</div>
		
		<div class="about_index_program">
<?php
	
	include("connect.php");
	$Connection = new mysqli("$host","$usr","$pwd", "$db");
	
	if ($Connection->connect_errno) {
		
		echo "Errno: " . $Connection->connect_errno . "\n";
		echo "Error: " . $Connection->connect_error . "\n";
		exit;
	}
	mysqli_set_charset($Connection,"utf8");
	if($search!="" && $search!= "Search for an artist")
	{
		$result = $Connection->query("select Event_Id,Date_Format(EventDate,'%d-%b-%Y'),Time,Artist,Miscellaneous,Photos,DAYNAME(EventDate) FROM Event where Artist regexp '$search'");
	}
?>

<?php if($result->num_rows > 0) : ?>
<?php if($search!="" && $search!= "Search for an artist"): ?>	<p class="search_result"><?php echo $result->num_rows; ?> number of detail(s) found: <?php echo $search; ?>  </p> <?php endif; ?>
<table>
	<tr>
	<td>Date</td>
	<td>Program Details</td>
	</tr>

<?php 
$OldMiss="";
$inserttag="<span class=\"seardstring\"> $0 </span>";

while($array=mysqli_fetch_row($result))
{
	$ArtistString="";
	$Gallery="";
	//Extracting Artist Details
	if($array[3]!=NULL)
	{
		$SemicolonSplit=explode(";", $array[3]);
		if(count($SemicolonSplit)>2)
		{
			foreach($SemicolonSplit as $ArtDetails)
			{
				if(!empty($ArtDetails))
				{
					$ColonSplit = explode(":", $ArtDetails);
					$ArtistName=$ColonSplit[1];
					$ArtistName=preg_replace('/ /','%20',$ArtistName);
					if($search!="" && $search!= "Search for an artist"){
						$ColonSplit[1] = preg_replace("/$search/i", $inserttag, $ColonSplit[1]);
						$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
					}
					else{
						$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
					}
					
				}
			}
		}

		else
		{
			$ColonSplit = explode(":", $SemicolonSplit[0]);
			$ArtistName=$ColonSplit[1];
			$ArtistName=preg_replace('/ /','%20',$ArtistName);
			if($search!="" && $search!= "Search for an artist"){
				$ColonSplit[1] = preg_replace('/$search/', $inserttag, $ColonSplit[1]);
				$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
			}
			
			else{
				$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
			}
		}
	}
	
	$array[1].="<br>".$array[6]."<br>".$array[2];

	if($array[5]!="")
	{
			$Gallery="<span class=\"gallery\" style=\"position:fixed top:10px;\"><a href=\"Photogallery.php?ArtistId=".$array[0]."\">Photos</a></span>";
	}
	
	if($array[4]!=NULL)
	{
		$result1 = $Connection->query("select Date_Format(EventDate,'%d-%b-%Y') from Event where Miscellaneous regexp '$array[4]' order by EventDate limit 1");
		$array1 = mysqli_fetch_row($result1);
		$StartDate = $array1[0];
		$result1 = $Connection->query("select Date_Format(EventDate,'%d-%b-%Y') from Event where Miscellaneous regexp '$array[4]' order by EventDate desc limit 1");
		$array1 = mysqli_fetch_row($result1);
		$EndDate = $array1[0];
		
		
		if($array[4]!=$OldMiss)
		{
			if($EndDate!=$StartDate)
			{
				echo "<tr><td align=center>".$StartDate."<br>To<br>".$EndDate." <br>$Gallery </td><td align=left> $ArtistString $array[4]</td></tr>";
				
			}
			else
			{
				echo "<tr><td align=center>".$array[1]."<br> $Gallery</td><td align=left> $ArtistString $array[4]</td></tr>";
			}
			
		}
		$OldMiss=$array[4];
	}
	
	else
	{
		echo "<tr><td align=center>".$array[1]."<br> $Gallery</td><td align=left> $ArtistString</td></tr>";
	}
}
?>
			</table>
			<?php else: ?>
			<div class="title">
				<p>No records found</p>
			</div>
		<?php endif; ?>
		</div>
			<div class="search">
				<form method="post" action="">
					<input class="search_field" type="text" name="search" value="Search for an artist" onclick="if(this.value=='Search for an artist') this.value='';" onblur="if(this.value=='')this.value='Search for an artist';">
					<input type="submit" class="button" value="" >
				</form>
			</div>
	</div>
	<div class="footer">
		<div class="foot_box">
			<div class="left">
				<ul>
					<li><a href="http://www.srirangadigital.com/" target="_blank">Designed, Developed and Maintained by <span class="developedby">Sriranga Digital </span> &nbsp;<img class="developedby-logo" src="images/sriranga-logo.png" alt="" /></a></li>
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
