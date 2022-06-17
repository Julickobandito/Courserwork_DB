<?php
include('connect.php');

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id'])) {
    $sth = $db->query("SELECT * FROM airplane WHERE Id = {$_REQUEST['Id']}");
    $airplanes = $sth->fetch();
}
$sth = $db->query("SELECT * FROM airline");
$airlines = $sth->fetchAll();


// handle change data logic
if(isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
    {   print "****";
        print_r($_REQUEST);
        $sql = "
		UPDATE airplane SET
			Model = '{$_REQUEST['Model']}',
            AirlineId = {$_REQUEST['AirlineId']},
            SeatsAmount = {$_REQUEST['SeatsAmount']},
		    LuggageAllowancePerPerson = {$_REQUEST['LuggageAllowancePerPerson']},
		    ExtraPoundsLuggageCost = {$_REQUEST['ExtraPoundsLuggageCost']}               
		WHERE Id = {$_REQUEST['Id']}
		";
        $sth = $db->exec($sql);
        print $sql;
    }
    else
    {
        $sql = "
		INSERT INTO airplane (Model, AirlineId, SeatsAmount, LuggageAllowancePerPerson,ExtraPoundsLuggageCost )
		VALUES ('{$_REQUEST['Model']}', {$_REQUEST['AirlineId']}, {$_REQUEST['SeatsAmount']},{$_REQUEST['LuggageAllowancePerPerson']}, {$_REQUEST['ExtraPoundsLuggageCost']} )
		";
        $sth = $db->exec($sql);
    }
    header('Location: airplane.php');
}

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
{
    $sth = $db->query("SELECT * FROM airplane WHERE Id = {$_REQUEST['Id']}");
    $airplane = $sth->fetch();
    //var_dump($airline);
} else {
    $airplane = [
        'Id' => '',
        'Model' => '',
        'AirlineId' => '',
        'SeatsAmount' => '',
        'LuggageAllowancePerPerson' => '',
        'ExtraPoundsLuggageCost' => ''
    ];
}

include('form_airplane.php');