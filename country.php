<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, use-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="small_tables.css">
    <style>
        #add{
            position: absolute;
            top: 60px;
            left: 180px;
        }
    </style>
</head>
<body>
<?php
include('connect.php');
$sql = "SELECT * FROM country";
$sth = $db->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="flex">
        <h2>Countries</h2>
        <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <div id="add"><a href="edit_country.php"><img width="16" src="img/create.svg" alt="create"></a></div>
    <table class="countries">
        <tr>
            <th class="Id">Id</th>
            <th class="Country">Country</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr id="main">
                <td class="Id"><?=$row['Id']?></td>
                <td class="Country"><?=$row['Name']?></td>
                <td><a class="edit" href="edit_country.php?Id=<?=$row['Id']?>"><img src="img/update.svg" width="18" alt="update"></a></td>
                <td><a class="delete" href="delete_country.php?Id=<?=$row['Id']?>"><img src="img/delete.svg" width="10px" alt="delete"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>