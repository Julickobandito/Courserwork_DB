<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
    <style>
        input{
            background: none;
        }
    </style>
</head>
<body>
<form action="airplane_edit.php" method="POST">
    <table>
        <tr>
            <td class="label">Airplane:
            <input type="hidden" name="Id" value="<?=$airplane['Id']?>"/>
                <input type="text" id="Model" name="Model" value="<?= $airplane['Model'] ?>"/></td>
            <td><label for="airline">Airline: </label>
            <select name="AirlineId" id="airline">
                <?php foreach ($airlines as $row): ?>
                    <option value="<?= $row['Id'] ?>" <?= ($row['Id']==$airplane['AirlineId'])?'selected':''?>><?= $row['Name'] ?></option>
                <?php endforeach; ?>
            </select>
            </td></tr>
            <tr>
            <td>
                <label for="SeatsAmount">Seats Amount: </label>
                <input type="text" id="SeatsAmount" name="SeatsAmount" value="<?= $airplane['SeatsAmount'] ?>"/></td>
            <br>
            <td> <label for="LuggageAllowancePerPerson">Luggage Allowance Per Person: </label>
                <input type="text" id="LuggageAllowancePerPerson" name="LuggageAllowancePerPerson" value="<?= $airplane['LuggageAllowancePerPerson'] ?>"/></td>
            <td><label for="ExtraPoundsLuggageCost">Extra Pounds Luggage Cost: </label>
            <input type="text" id="ExtraPoundsLuggageCost" name="ExtraPoundsLuggageCost" value="<?= $airplane['ExtraPoundsLuggageCost'] ?>"/></td>
        </tr>
        <tr>
            <td colspan="5" class="button-cont">

                <button id="btn" name="submit">Submit</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>