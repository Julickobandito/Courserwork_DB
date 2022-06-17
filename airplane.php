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
        #delete, #edit{
            width: 20px;
        }
        tr td{
            padding-left: 0.5%;
        }
    </style>
</head>
<body>
<?php
include('connect.php');
$sql = "SELECT airplane.Id as Id, Model, airline.Name as Airline, SeatsAmount, LuggageAllowancePerPerson, ExtraPoundsLuggageCost from airplane join airline on airplane.AirlineId = airline.Id";
$sth = $db->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="flex">
        <h2>Airplanes</h2>
        <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <div id="add"><a href="airplane_edit.php"><img width="16" src="img/create.svg" alt="create"></a></div>
    <div class="wrapper">
        <table class="airplanes">
            <tr>
                <th class="AirplaneId">Id</th>
                <th class="AirplaneModel">Model</th>
                <th class="AirlineName">Airline</th>
                <th class="SeatsAmount">Seats amount</th>
                <th class="LuggageAllowancePerPerson">Luggage allowance pp</th>
                <th class="ExtraPoundsLuggageCost">ExtraPoundsLuggageCost</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr id="main">
                    <td class="Id"><?=$row['Id']?></td>
                    <td class="Model"><?=$row['Model']?></td>
                    <td class="Airline"><?=$row['Airline']?></td>
                    <td class="SeatsAmount"><?=$row['SeatsAmount']?></td>
                    <td class="LuggageAllowancePerPerson"><?=$row['LuggageAllowancePerPerson']?></td>
                    <td class="ExtraPoundsLuggageCost"><?=$row['ExtraPoundsLuggageCost']?></td>
                    <td id="edit"><a  class="edit" href="airplane_edit.php?Id=<?=$row['Id']?>"><img src="img/update.svg" width="18" alt="update"></a></td>
                    <td id="delete"><a class="edit" href="airplane_delete.php?Id=<?=$row['Id']?>"><img src="img/delete.svg" width="10px" alt="delete"></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>