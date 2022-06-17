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
<form action="flight_edit.php" method="POST">
    <table>
        <tr>
            <td class="label">Flight:</td>
            <td><input type="hidden" name="Id" value="<?=$flight['Id']?>"/>
                <input type="text" id="FlightNum" name="FlightNum" value="<?= $flight['FlightNum'] ?>"/></td>
            <td>
                <label for="PlaneCode">Plane</label>
                <select name="PlaneCode" id="PlaneCode">
                    <?php foreach ($airplanes as $row): ?>
                        <option value="<?= $row['Id'] ?>" <?= ($row['Id']==$flight['PlaneCode'])?'selected':''?>><?= $row['Model'] ?></option>
                    <?php endforeach; ?>
                <label for="DepartureTime">Departure Time</label>
                <input type="text" id="DepartureTime" name="DepartureTime" value="<?= $flight['DepartureTime'] ?>"/></td>
            <td>
                <label for="ArrivalTime">Arrival Time</label>
                <input type="text" id="ArrivalTime" name="ArrivalTime" value="<?= $flight['ArrivalTime'] ?>"/></td>
            <label for="DepartureTerminal">Departure terminal</label>
            <select name="DepartureTerminal" id="DepartureTerminal">
                <?php foreach ($terminals as $row): ?>
                    <option value="<?= $row['Id'] ?>" <?= ($row['Id']==$flight['DepartureTerminal'])?'selected':''?>><?= $row['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="ArrivalTerminal">Arrival terminal</label>
            <select name="ArrivalTerminal" id="ArrivalTerminal">
                <?php foreach ($terminals as $row): ?>
                    <option value="<?= $row['Id'] ?>" <?= ($row['Id']==$flight['ArrivalTerminal'])?'selected':''?>><?= $row['name'] ?></option>
                <?php endforeach; ?>
            </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="button-cont">

                <button name="submit">Submit</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>