<?php
include('connect.php');

$sth = $db->query("SELECT * FROM country");
$countries = $sth->fetchAll();


// handle change data logic
if(isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
    {
        $sql = "
		UPDATE country SET
			Name = '{$_REQUEST['Name']}'
		WHERE Id = {$_REQUEST['Id']}
		";
        $sth = $db->exec($sql);
    }
    else
    {
        $sql = "
		INSERT INTO country (Name)
		VALUES ('{$_REQUEST['Name']}')
		";
        $sth = $db->exec($sql);
    }
    header('Location: country.php');
}

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
{
    $sth = $db->query("SELECT * FROM country WHERE Id = {$_REQUEST['Id']}");
    $country = $sth->fetch();
} else {
    $country = [
        'Id' => '',
        'Name' => ''
    ];
}

include('form_country.php');