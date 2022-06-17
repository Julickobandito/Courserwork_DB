<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="edit.css">
    <title>Document</title>
</head>
<body>
<form action="terminal_edit.php" method="POST">
    <table>
        <tr>
            <td class="label">Terminal:
             <input type="hidden" name="Id" value="<?=$terminal['Id']?>"/>
                <input type="text" id="Name" name="Name" value="<?= $terminal['Name'] ?>"/></td>
            <td>
                <label for="Type">Type: </label>
                <select name="Type" id="Type">
                    <option value="в">в</option>
                    <option value="м">м</option>
                </select></td>
            <td>
            <label for="airport">Airport: </label>
            <select name="AirportId" id="airport">
                <?php foreach ($airports as $row): ?>
                    <option value="<?= $row['Id'] ?>" <?= ($row['Id']==$terminal['AirportId'])?'selected':''?>><?= $row['Name'] ?></option>
                <?php endforeach; ?>
            </select>
            </td>
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