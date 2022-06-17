<?php
include('connect.php');

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id'])) {
    $sth = $db->query("SELECT * FROM airline WHERE Id = {$_REQUEST['Id']}");
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
		UPDATE airline SET
			Name = '{$_REQUEST['Name']}',
		    Owner = '{$_REQUEST['Owner']}',
		    CountryId = {$_REQUEST['CountryId']}               
		WHERE Id = {$_REQUEST['Id']}
		";
        $sth = $db->exec($sql);
        print $sql;
    }
    else
    {
        $sql = "
		INSERT INTO airline (Name, Owner, CountryId)
		VALUES ('{$_REQUEST['Name']}', '{$_REQUEST['Owner']}', {$_REQUEST['CountryId']})
		";
        $sth = $db->exec($sql);
    }
    header('Location: airline.php');
}

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
{
    $sth = $db->query("SELECT * FROM airline WHERE Id = {$_REQUEST['Id']}");
    $airline = $sth->fetch();
    //var_dump($airline);
} else {
    $airline = [
        'Id' => '',
        'Name' => '',
        'Owner' => '',
        'CountryId' => ''
    ];
}

include('form_airline.php');