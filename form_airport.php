<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
<form action="airport_edit.php" method="POST">
    <table>
        <tr>
            <td class="label">Airport: </td>
            <td><input type="hidden" name="Id" value="<?=$airport['Id']?>"/>
                <input type="text" id="Name" name="Name" value="<?= $airport['Name'] ?>"/></td>
            <td>
                <label for="Locality">Locality: </label>
                <input type="text" id="Locality" name="Locality" value="<?= $airport['Locality'] ?>"/></td>
                <td><label for="country">Country: </label>
                <select name="CountryId" id="country">
                    <?php foreach ($countries as $row): ?>
                        <option value="<?= $row['Id'] ?>" <?= ($row['Id']==$airport['CountryId'])?'selected':''?>><?= $row['Name'] ?></option>
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