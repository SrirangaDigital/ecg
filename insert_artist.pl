#!/usr/bin/perl

$host = $ARGV[0];
$db = $ARGV[1];
$usr = $ARGV[2];
$pwd = $ARGV[3];

use DBI();

open(IN,"programsandphotos.xml") or die "can't open programsandphotos.xml\n";

my $dbh=DBI->connect("DBI:mysql:database=$db;host=$host","$usr","$pwd");
$sth_enc=$dbh->prepare("SET NAMES utf8");
$sth_enc->execute();
$sth_enc->finish();

$sth_drop=$dbh->prepare("DROP TABLE IF EXISTS Artist");
$sth_drop->execute();
$sth_drop->finish();

$sth11=$dbh->prepare("CREATE TABLE Artist(Artist_Id int(11) NOT NULL AUTO_INCREMENT, Artist_Name varchar(100),	PRIMARY KEY (Artist_Id))AUTO_INCREMENT=10001 ENGINE=MyISAM CHARACTER SET utf8 collate utf8_general_ci;");
$sth11->execute();
$sth11->finish(); 

$line = <IN>;

while($line)
{
	if($line =~ /<artist type="(.*)" instrument="(.*)">(.*)<\/artist>/)
	{
		$type = $1;
		$instrument = $2;
		$artistname = $3;
		
		insert_artist($type,$instrument,$artistname);
	}
	$line = <IN>;
}

close(IN);
$dbh->disconnect();


sub insert_artist()
{
	my($type,$instrument,$artistname) = @_;
	my($sth,$ref,$sth1);
	
	$type =~ s/'/\\'/g;
	$instrument =~ s/'/\\'/g;
	$artistname =~ s/'/\\'/g;
	
	$sth = $dbh->prepare("SELECT Artist_Id FROM Artist WHERE Artist_Name = '$artistname'");
	$sth->execute();
	$ref=$sth->fetchrow_hashref();
	
	if($sth->rows()==0)
	{
		$sth1=$dbh->prepare("INSERT INTO Artist VALUES (0,'$artistname')");
		$sth1->execute();
		$sth1->finish();
	}
	
	$sth->finish();	
}
