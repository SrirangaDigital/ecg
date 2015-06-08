#!/usr/bin/perl

$host = $ARGV[0];
$db = $ARGV[1];
$usr = $ARGV[2];
$pwd = $ARGV[3];

use DBI();
@ids=();

open(IN,"<:utf8","programsandphotos.xml") or die "can't open programsandphotos.xml\n";

my $dbh=DBI->connect("DBI:mysql:database=$db;host=$host","$usr","$pwd");
$sth_enc=$dbh->prepare("SET NAMES utf8");
$sth_enc->execute();
$sth_enc->finish();

$sth_drop=$dbh->prepare("DROP TABLE IF EXISTS Event");
$sth_drop->execute();
$sth_drop->finish();

$sth11=$dbh->prepare("CREATE TABLE Event (
Event_Id int(11) NOT NULL AUTO_INCREMENT,
EventDate DATE,
Time varchar(100),
Photos varchar(100),
Artist varchar(1000),
Miscellaneous varchar (500),
PRIMARY KEY (Event_Id)) ENGINE=MyISAM CHARACTER SET utf8 collate utf8_general_ci");

$sth11->execute();
$sth11->finish(); 

$line = <IN>;
$miscellanious = '';

while($line)
{
	if($line =~ /<mmedia year="(.*)">/)
	{
		$year = $1;
	}
	elsif($line =~ /<entry eid="(.*)" photos="(.*)">/)
	{
		$evendId = $1;
		$photos = $2;
	}	
	elsif($line =~ /<date>(.*)<\/date>/)
	{
		@sumne = split(/;/, $1);
		$date = $sumne[0];
		$time = $sumne[1];
	}
	elsif($line =~ /<artist type="(.*)" instrument="(.*)">(.*)<\/artist>/)
	{
		$type = $1;
		$instrument = $2;
		$name = $3;
		$artist = "";
		$artist = get_artistid($name).":".$name.":".$type.":".$instrument.";";
		$artistDetails .= $artist;
	}	
	elsif($line =~ /<misc>(.*)<\/misc>/)
	{
		$miscellanious .= $1;
	}	
	elsif($line =~ /<\/entry>/)
	{
		insert_event($year,$evendId,$photos,$date,$time,$artistDetails,$miscellanious);
		$miscellanious = "";
		$artistDetails = "";
		$photos = "";
	}
	$line = <IN>;
}

close(IN);
$dbh->disconnect();

sub insert_event()
{
	my($year,$evendId,$photos,$date,$time,$artistDetails,$miscellanious) = @_;
	my($sth1);
	
	$title =~ s/'/\\'/g;
	$artistDetails =~ s/'/\\'/g;
	$miscellanious =~ s/'/\\'/g;
	
	$sth1=$dbh->prepare("INSERT INTO Event VALUES ('', '$date', '$time', '$photos', '$artistDetails', '$miscellanious')");

	$sth1->execute();
	$sth1->finish();
}

sub get_artistid()
{
	my($name) = @_;
	my($sth,$ref,$artistid);

	$name =~ s/'/\\'/g;
	
	$sth=$dbh->prepare("SELECT Artist_Id FROM Artist WHERE Artist_Name = '$name'");
	$sth->execute();
			
	my $ref = $sth->fetchrow_hashref();
	$artistid = $ref->{'Artist_Id'};
	$sth->finish();
	return($artistid);
}

