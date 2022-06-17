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
        #delete{
            width: 25px;
        }
    </style>
</head>
<body>
<?php
include('connect.php');
$sql = "SELECT airport.Id as Id, airport.Name as Name, airport.Locality as Locality, country.Name as Country  from airport join country on airport.CountryId = country.Id";
$sth = $db->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
<div class="flex">
    <h2>Airports</h2>
    <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <div id="add"><a href="airport_edit.php"><img width="16" src="img/create.svg" alt="create"></a></div>
    <table class="airports">
        <tr>
            <th class="AirportId">Id</th>
            <th class="AirportName">Name</th>
            <th class="Locality">Locality</th>
            <th class="CountryName">Country</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr id="main">
                <td class="Id"><?=$row['Id']?></td>
                <td class="Name"><?=$row['Name']?></td>
                <td class="Locality"><?=$row['Locality']?></td>
                <td class="Country"><?=$row['Country']?></td>
                <td><a class="edit" href="airport_edit.php?Id=<?=$row['Id']?>"><img src="img/update.svg" width="18" alt="update"></a></td>
                <td id="delete"><a class="delete" href="airport_delete.php?Id=<?=$row['Id']?>"><img src="img/delete.svg" width="10px" alt="delete"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>