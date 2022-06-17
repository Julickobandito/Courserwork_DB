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
            left: 145px;
        }
    </style>
</head>
<body>
<?php
include('connect.php');
$sql = "SELECT terminal.Id as Id, terminal.Type as Type, terminal.Name as Name, airport.Name as Airport
from terminal join airport on terminal.AirportId = airport.Id";
$sth = $db->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="terminal">
    <div class="flex">
        <h2>Terminals</h2>
        <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <div id="add"><a href="terminal_edit.php"><img width="16" src="img/create.svg" alt="create"></a></div>
    <table class="terminals">
        <tr>
            <th class="TerminalId">Id</th>
            <th class="TerminalName">Name</th>
            <th class="Type">Type</th>
            <th class="Airport">Airport</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr id="main">
                <td class="Id"><?=$row['Id']?></td>
                <td class="Name"><?=$row['Name']?></td>
                <td class="Type"><?=$row['Type']?></td>
                <td class="Airport"><?=$row['Airport']?></td>
                <td><a class="edit" href="terminal_edit.php?Id=<?=$row['Id']?>"><img src="img/update.svg" width="18" alt="update"></a></td>
                <td><a class="delete" href="terminal_delete.php?Id=<?=$row['Id']?>"><img src="img/delete.svg" width="10px" alt="delete"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>