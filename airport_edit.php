<?php
include('connect.php');

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id'])) {
    $sth = $db->query("SELECT * FROM airport WHERE Id = {$_REQUEST['Id']}");
    $airlines = $sth->fetch();
}
$sth = $db->query("SELECT * FROM country");
$countries = $sth->fetchAll();


// handle change data logic
if(isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
    {   print "****";
        print_r($_REQUEST);
        $sql = "
		UPDATE airport SET
			Name = '{$_REQUEST['Name']}',
		    Locality = '{$_REQUEST['Locality']}',
		    CountryId = {$_REQUEST['CountryId']}               
		WHERE Id = {$_REQUEST['Id']}
		";
        $sth = $db->exec($sql);
        print $sql;
    }
    else
    {
        $sql = "
		INSERT INTO airport (Name, Locality, CountryId)
		VALUES ('{$_REQUEST['Name']}', '{$_REQUEST['Locality']}', {$_REQUEST['CountryId']})
		";
        $sth = $db->exec($sql);
    }
    header('Location: airport.php');
}

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
{
    $sth = $db->query("SELECT * FROM airport WHERE Id = {$_REQUEST['Id']}");
    $airport = $sth->fetch();
    //var_dump($airline);
} else {
    $airport = [
        'Id' => '',
        'Name' => '',
        'Locality' => '',
        'CountryId' => ''
    ];
}

include('form_airport.php');