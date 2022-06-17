<?php
include('connect.php');

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id'])) {
    $sth = $db->query("SELECT * FROM flight WHERE Id = {$_REQUEST['Id']}");
    $airlines = $sth->fetch();
}
$sth = $db->query("SELECT * FROM airport");
$airports = $sth->fetchAll();

$sth = $db->query("select
    t.Id, concat(t.Name, ' (', a.Name, ')') name
  from
    terminal t
     inner join airport a on t.AirportId = a.Id");
$terminals = $sth->fetchAll();

$sth = $db->query("SELECT * FROM airplane");
$airplanes = $sth->fetchAll();

// handle change data logic
if(isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
    {   print "****";
        print_r($_REQUEST);
        $sql = "
		UPDATE flight SET
			FlightNum = {$_REQUEST['FlightNum']},
		    PlaneCode = {$_REQUEST['PlaneCode']},
		    DepartureTime = '{$_REQUEST['DepartureTime']}',  
            ArrivalTime = '{$_REQUEST['ArrivalTime']}',  
            DepartureTerminal = {$_REQUEST['DepartureTerminal']},
            ArrivalTerminal = {$_REQUEST['ArrivalTerminal']}
		WHERE Id = {$_REQUEST['Id']}
		";
        $sth = $db->exec($sql);
        print $sql;
    }
    else
    {
        $sql = "
		INSERT INTO flight (FlightNum, PlaneCode, DepartureTime, ArrivalTime, DepartureTerminal,ArrivalTerminal )
		VALUES ({$_REQUEST['FlightNum']}, {$_REQUEST['PlaneCode']}, '{$_REQUEST['DepartureTime']}','{$_REQUEST['ArrivalTime']}', {$_REQUEST['DepartureTerminal']},{$_REQUEST['ArrivalTerminal']}  )
		";
        $sth = $db->exec($sql);
    }
    header('Location: flight.php');
}

if (isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id']))
{
    $sth = $db->query("SELECT * FROM flight WHERE Id = {$_REQUEST['Id']}");
    $flight = $sth->fetch();
    //var_dump($airline);
} else {
    $flight = [
        'Id' => '',
        'FlightNum' => '',
        'PlaneCode' => '',
        'DepartureTime' => '',
        'ArrivalTime' => '',
        'DepartureTerminal' => '',
        'ArrivalTerminal' => ''
    ];
}

include('form_flight.php');