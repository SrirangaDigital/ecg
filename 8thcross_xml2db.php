
<?php 
	//Create Database
	include("html/connect.php");
	$Connection=mysql_connect($host, $usr,$pwd);
	mysql_select_db($db,$Connection);
	mysql_set_charset("utf8",$Connection);
		
	$Create_Event="CREATE TABLE `Event` (
	`Event_Id` int(11) NOT NULL AUTO_INCREMENT,
	`EventDate` DATE,
	`Time` varchar(100),
	`Photos` varchar(100),
	`Artist` varchar(1000),
	`Miscellaneous` varchar (500),
	PRIMARY KEY (`Event_Id`))";
  
	$Create_Artist="CREATE TABLE `Artist` (
	`Artist_Id` int(11) NOT NULL AUTO_INCREMENT,
	`Artist_Name` varchar(100),
	PRIMARY KEY (`Artist_Id`))";

	$Create_Photos="CREATE TABLE `Photos` (
	`PhotoId` varchar(11),
	`PhotosDescription` varchar(100),
	PRIMARY KEY (`PhotoId`))";
	  
	mysql_query($Create_Event,$Connection) or die("Cannot Create Event Table");
	mysql_query($Create_Artist,$Connection) or die("Cannot Create Artist Table");
	mysql_query($Create_Photos,$Connection) or die("Cannot Create Photos Table");
	$XmlFile=file_get_contents('programsandphotos.xml');
	if(!$XmlFile)
	{
		echo"XML file not found\n";
		exit;
	}
	
	$line=preg_split("/\n/",$XmlFile);
	$InsertEvent="";
	$ArtistDetails="";
	$Miscellanious="";
	
	//INSERTING INTO TABLE.
	$Photos="";
	for($i=0;$i<sizeof($line);$i++)
	{
		$String = $line[$i];
		if(preg_match("/\<entry eid=\"(.*)\" photos=\"(.*)\"\>/", $String, $matches))
		{
			$EntryId="";
			$EntryId = $matches[1];
			$Photos = $matches[2];
		}
		else if(preg_match("/\<date\>(.*)\<\/date\>/", $String, $matches))
		{
			$DateTime=split(";",$matches[1]);
			$Time="";
			$Date =$DateTime[0];
			$Time=$DateTime[1];
		}
		else if(preg_match("/\<misc\>(.*)\<\/misc\>/", $String, $matches))
		{
			if($matches[1]!="")
			{
				$Miscellanious.=$matches[1]."\n";
			}		
		}
		else if(preg_match("/\<artist type=\"(.*)\" instrument=\"(.*)\"\>(.*)\<\/artist\>/",$String,$matches))
		{
			$Type="";
			$Instrument="";
			$Artist="";
			$Type=$matches[1];
			$Instrument=$matches[2];
			$Artist=$matches[3];
			$ArtistID="";
							
			$GetArtist="SELECT Artist_Id FROM Artist WHERE Artist_Name REGEXP '$Artist'";
			if($Artist!="")
			{
				$result=mysql_query($GetArtist);
				if(mysql_num_rows($result)>0)
				{
					$result=mysql_fetch_row($result);
					$ArtistID=$result[0];
				}
				else
				{
					$InsertArtist="INSERT INTO Artist VALUES ('','$Artist')";
					mysql_query($InsertArtist);
					
					$GetArtist="SELECT Artist_Id FROM Artist WHERE Artist_Name REGEXP '$Artist'";
					if($result=mysql_query($GetArtist))
					{
						$result=mysql_fetch_row($result);
						$ArtistID=$result[0];
					}
				}	
				$ArtistDetails.= $ArtistID.":".$Artist.":".$Type.":".$Instrument.";";
			}
		}
		//End of ENTRY, Insert data to the Database.
		else if(preg_match("/\<\/entry\>/", $String))
		{
			$InsertEvent = "INSERT INTO Event VALUES ('', '$Date', '$Time', '$Photos', '$ArtistDetails', '$Miscellanious');\n";
			mysql_query($InsertEvent);					
			$ArtistDetails="";
			$Miscellanious="";
			$Photos="";
		}			
		// Enter photo details.
		else if(preg_match("/\<desc id=\"(.*)\"\>(.*)\<\/desc\>/", $String, $matches))
		{
			$Description="";
			$PhotosID="";
			$PhotosID = $matches[1];
			$Description = $matches[2];
			$InsertPhoto="INSERT INTO Photos VALUES ('$PhotosID','$Description')";
			mysql_query($InsertPhoto);
		}
	}
?>
