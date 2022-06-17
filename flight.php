<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="small_tables.css">
    <style>
        #add{
            position: absolute;
            top: 60px;
            left: 180px;
        }
        .Id{
            width: 30px;
        }
        tr td{
            padding-left: 0.5%;
        }
        #delete, #edit{
            width: 20px;
        }
        td a {
            width: 40px;
        }
    </style>
</head>
<body>
<?php
include('connect.php');
$sql = "select
       f.Id,
       f.FlightNum,
       ad.Name airport_d,
       td.Name term_d,
       f.DepartureTime,
       aa.Name airport_a,
       ta.Name term_a,
       f.ArrivalTime,
       ap.Model airplane_model
from
    flight f
     inner join terminal td on td.Id = f.DepartureTerminal
     inner join airport ad on ad.Id = td.AirportId
     inner join terminal ta on ta.Id = f.ArrivalTerminal
     inner join airport aa on aa.Id = ta.AirportId
     inner join airplane ap on f.PlaneCode = ap.Id";
$sth = $db->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="flex">
        <h2>Flights</h2>
        <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <div id="add"><a href="flight_edit.php"><img width="16" src="img/create.svg" alt="create"></a></div>
    <div class="wrapper">
        <table class="flights">

            <tr>
                <th class="Id">Id</th>
                <th class="FlightNum">Flight Number</th>
                <th class="Departure airport">Departure airport</th>
                <th class="Departure terminal">Departure terminal</th>
                <th class="Departure time">Departure time</th>
                <th class="Arrival airport">Arrival airport</th>
                <th class="Departure terminal">Arrival terminal</th>
                <th class="Arrival time">Arrival time</th>
                <th class="Airplane model">Airplane model</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr id="main">
                    <td class="Id"><?=$row['Id']?></td>
                    <td class="FlightNum"><?=$row['FlightNum']?></td>
                    <td class="airport_d"><?=$row['airport_d']?></td>
                    <td class="term_a"><?=$row['term_d']?></td>
                    <td class="DepartureTime"><?=$row['DepartureTime']?></td>
                    <td class="airport_a"><?=$row['airport_a']?></td>
                    <td class="term_a"><?=$row['term_a']?></td>
                    <td class="ArrivalTime"><?=$row['ArrivalTime']?></td>
                    <td class="airplane_model"><?=$row['airplane_model']?></td>
                    <td id="edit"><a class="edit" href="flight_edit.php?Id=<?=$row['Id']?>"><img src="img/update.svg" width="18" alt="update"></a></td>
                    <td id="delete"><a class="delete" href="flight_delete.php?Id=<?=$row['Id']?>"><img src="img/delete.svg" width="10px" alt="delete"></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>