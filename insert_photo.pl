#!/usr/bin/perl

$host = $ARGV[0];
$db = $ARGV[1];
$usr = $ARGV[2];
$pwd = $ARGV[3];

use DBI();

open(IN,"programsandphotos.xml") or die "can't open programsandphotos.xml\n";

my $dbh=DBI->connect("DBI:mysql:database=$db;host=$host","$usr","$pwd");
$sth_enc=$dbh->prepare("set names utf8");
$sth_enc->execute();
$sth_enc->finish();

$sth_drop=$dbh->prepare("DROP TABLE IF EXISTS Photos");
$sth_drop->execute();
$sth_drop->finish();

$sth11=$dbh->prepare("CREATE TABLE Photos (PhotoId varchar(11), PhotosDescription varchar(200), PRIMARY KEY (PhotoId))ENGINE=MyISAM character set utf8 collate utf8_general_ci;");
$sth11->execute();
$sth11->finish(); 

$line = <IN>;

while($line)
{

	if($line =~ /<desc id="(.*)">(.*)<\/desc>/)
	{
		$id = $1;
		$description = $2;
		insert_photo($id,$description);
	}
	$line = <IN>;
}

close(IN);
$dbh->disconnect();


sub insert_photo()
{
	my($PhotosID,$Description) = @_;

	$description =~ s/'/\\'/g;
	
	my($sth);
	$sth = $dbh->prepare("INSERT INTO Photos VALUES ('$PhotosID','$Description')");
	$sth->execute();
	$sth->finish();	
}
