<?php
include('connect.php');

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id'])) {
    $sth = $db->query("SELECT * FROM terminal WHERE Id = {$_REQUEST['Id']}");
    $airlines = $sth->fetch();
}
$sth = $db->query("SELECT * FROM airport");
$airports = $sth->fetchAll();


// handle change data logic
if(isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
    {   print "****";
        print_r($_REQUEST);
        $sql = "
		UPDATE terminal SET
			Name = '{$_REQUEST['Name']}',
		    Type = '{$_REQUEST['Type']}',
		    AirportId = {$_REQUEST['AirportId']}               
		WHERE Id = {$_REQUEST['Id']}
		";
        $sth = $db->exec($sql);
        print $sql;
    }
    else
    {
        $sql = "
		INSERT INTO terminal (Name, Type, AirportId)
		VALUES ('{$_REQUEST['Name']}', '{$_REQUEST['Type']}', {$_REQUEST['AirportId']})
		";
        $sth = $db->exec($sql);
    }
    header('Location: terminal.php');
}

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
{
    $sth = $db->query("SELECT * FROM terminal WHERE Id = {$_REQUEST['Id']}");
    $terminal = $sth->fetch();
    //var_dump($airline);
} else {
    $terminal = [
        'Id' => '',
        'Name' => '',
        'Type' => '',
        'AirportId' => ''
    ];
}

include('form_terminal.php');