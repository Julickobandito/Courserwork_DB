<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="small_tables.css">
</head>
<body>
<?php
include('connect.php');
$sql = "SELECT airline.Id as Id, airline.Name as Name, airline.Owner as Owner, country.Name as Country  from airline join country on airline.CountryId = country.Id";
$sth = $db->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="flex">
    <h2>Airlines</h2>
    <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <div id="add"><a href="airline_edit.php"><img width="16" src="img/create.svg" alt="create"></a></div>
    <div class="wrapper">
        <table class="airlines">

            <tr>
                <th class="AirlineId">Id</th>
                <th class="AirlineName">Name</th>
                <th class="Owner">Owner</th>
                <th class="CountryName">Country</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr id="main">
                    <td class="Id"><?=$row['Id']?></td>
                    <td class="Name"><?=$row['Name']?></td>
                    <td class="Owner"><?=$row['Owner']?></td>
                    <td class="Country"><?=$row['Country']?></td>
                    <td><a class="edit" href="airline_edit.php?Id=<?=$row['Id']?>"><img src="img/update.svg" width="18" alt="update"></a></td>
                    <td><a class="edit" href="airline_delete.php?Id=<?=$row['Id']?>"><img src="img/delete.svg" width="10px" alt="delete"></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>