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
    <form action="edit_country.php" method="POST">
        <table>
            <tr>
                <td class="label">Country:
                <input type="hidden" name="Id" value="<?=$country['Id']?>"/>
                    <input type="text" id="label" name="Name" value="<?= $country['Name'] ?>"/></td>
            </tr>
            <tr>
                <td colspan="3" class="button-cont">

                    <button id="btn" name="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>