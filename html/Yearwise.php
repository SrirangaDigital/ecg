<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SPVGM</title>
<link href="style/reset.css" rel="stylesheet">
<link href="style/indexstyle.css"  rel="stylesheet" >
</head>
<?php 
	$search="";
	if(isset($_POST['search']))
	{
		$search=$_POST['search'];
	}
	$year=$_GET['year'];
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
				<span class="subtitle"><a href="Yearwise.php?year=2017" >2017 Program List</a></span><br />
			</p>
			<p>
				<span class="subtitle"><a href="sketches.html" >Sketches of 2015 Programs</a></span><br />
			</p>
		</div>
<?php
	include("connect.php");
	$Connection=mysqli_connect($host, $usr,$pwd, $db);
	mysqli_set_charset($Connection, "utf8");
	if($search!="" && $search!= "Search for an artist"){
		$result=mysqli_query($Connection,"select Event_Id,Date_Format(EventDate,'%d-%b-%Y'),Time,Artist,Miscellaneous,Photos,DAYNAME(EventDate),Date_Format(EventDate,'%Y') FROM Event where Artist regexp '$search' and Date_Format(EventDate,'%Y')= '$year'");
	}
	else{
		//echo "select Event_Id,Date_Format(EventDate,'%d-%b-%Y'),Time,Artist,Miscellaneous,Photos,DAYNAME(EventDate),Date_Format(EventDate,'%Y') FROM Event where Date_Format(EventDate,'%Y')= '$year'";
		$result=mysqli_query($Connection,"select Event_Id,Date_Format(EventDate,'%d-%b-%Y'),Time,Artist,Miscellaneous,Photos,DAYNAME(EventDate),Date_Format(EventDate,'%Y') FROM Event where Date_Format(EventDate,'%Y')= '$year'");
	}
	
?>		
		
		<div class="about_index_program">
			<p class="title">
					<?php echo "<br>8th cross Ganesha Music Festival : $year <br>"; ?>
			</p> <br>


<?php if(mysqli_num_rows($result)>0) : ?>
<?php if($search!="" && $search!= "Search for an artist"): ?>	<p class="search_result"><?php echo mysqli_num_rows($result); ?> number of detail(s) found: <?php echo $search; ?>  </p> <?php endif; ?>
<table>
	<tr>
	<td class="left">Date</td>
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
		$SemicolonSplit=split(";", $array[3]);
		if(count($SemicolonSplit)>2)
		{
			foreach($SemicolonSplit as $ArtDetails)
			{
				if(!empty($ArtDetails))
				{
					$ColonSplit = split(":", $ArtDetails);
					$ArtistName=$ColonSplit[1];
					if($search!="" && $search!= "Search for an artist"){
						$ArtistName=preg_replace('/ /','%20',$ArtistName);
						$ColonSplit[1] = preg_replace("/$search/i", $inserttag, $ColonSplit[1]);
						$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
					}
					else{
						$ArtistName=preg_replace('/ /','%20',$ArtistName);
						$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
					}
					
				}
			}
		}

		else
		{
			$ColonSplit = split(":", $SemicolonSplit[0]);
			$ArtistName=$ColonSplit[1];
			if($search!="" && $search!= "Search for an artist"){
				$ArtistName=preg_replace('/ /','%20',$ArtistName);
				$ColonSplit[1] = preg_replace('/$search/i', $inserttag, $ColonSplit[1]);
				$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
			}
			
			else{
				$ArtistName=preg_replace('/ /','%20',$ArtistName);
				$ArtistString.= "<span class=\"artist\"><a href=\"ArtistDetails.php?ArtisiName=".$ArtistName."\">".$ColonSplit[1]."</a></span>"."&#160;&mdash;&#160;".$ColonSplit[3]."<br> ";
			}
		}
	}
	
	//Extracting date & time
	$array[1].="<br>".$array[6]."<br/>".$array[2];
	
	if($array[5]!="")
	{
			$Gallery="<span class=\"gallery\" style=\"position:fixed top:10px;\"><a href=\"Photogallery.php?ArtistId=".$array[0]."\">Photos</a></span>";
	}
	
	if($array[4]!=NULL)
	{
		$result1=mysqli_query($Connection,"select Date_Format(EventDate,'%d-%b-%Y') from Event where Miscellaneous = '$array[4]' and Date_Format(EventDate,'%Y') = '$year' order by EventDate limit 1");
		$array1=mysqli_fetch_row($result1);
		$StartDate=$array1[0];
		$result1=mysqli_query($Connection,"select Date_Format(EventDate,'%d-%b-%Y') from Event where Miscellaneous = '$array[4]' and Date_Format(EventDate,'%Y') = '$year' order by EventDate desc limit 1");
		$array1=mysqli_fetch_row($result1);
		$EndDate=$array1[0];
		
		
		if($array[4]!=$OldMiss)
		{
			if($EndDate!=$StartDate)
			{
				echo "<tr><td>".$StartDate."<br>To<br>".$EndDate." <br>$Gallery </td><td align=left> $ArtistString $array[4]</td></tr>";
				
			}
			else
			{
				echo "<tr><td>$array[1]<br> $Gallery</td><td align=left> $ArtistString $array[4]</td></tr>";
			}
			
		}
		$OldMiss=$array[4];
	}
	
	else
	{
		echo "<tr><td>".$array[1]."<br> $Gallery</td><td align=left> $ArtistString</td></tr>";
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
