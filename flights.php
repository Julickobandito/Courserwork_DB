<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
include('connect.php');
$sql = "SELECT * FROM country";
$sth = $db->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="flights">
    <tr>
        <th class="Id">Id</th>
        <th class="Country">Country</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach ($rows as $row): ?>
        <tr id="main">
            <td class="Id"><?=$row['Id']?></td>
            <td class="FlightNum"><?=$row['Name']?></td>
            <td><a class="edit" href="edit_country.php?id=<?=$row['id']?>">edit</a></td>
            <td><a class="edit" href="delete_country.php?id=<?=$row['id']?>">delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>