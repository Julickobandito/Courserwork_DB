<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="edit.css">
    <title>Document</title>
    <style>
        .btn{
            width: 350px;
        }
        .btn-2{
            width: 200px;
        }
        #warning{
            margin-top: 5%;
            border: 1px solid #cb2525;
            background: #cb2525;
        }
    </style>
</head>
<body>

<form action="luggage_edit.php" method="POST">
    <table>
        <tr>
            <td>
                <label for="weight">Weight</label>
                <input type="hidden" name="id" value="<?=$id ?>"/>
                <input type="text" id="weight" name="Weight" value="<?= $data['Weight'] ?>"/>
            </td>
            <td>
                <label for="AmountOfPlaces">Amount of Places</label>
                <input type="text" id="AmountOfPlaces" name="AmountOfPlaces" value="<?= $data['AmountOfPlaces'] ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="button-cont">

                <input class="btn" type="submit" name="submit" value="Submit"/>
            </td>
        </tr>
        <?php if (!empty($over)):?>
        <div >
        <tr>
            <td id="warning"><div>Luggage weight is exceeded by <b> <?= $over['weight'] ?> </b> kg</div>
            <div>Need to pay: <b> <?= $over['price'] ?> </b>UAH</div> </td>
            <td colspan="5" ><input class="btn btn-2" type="submit" name="submit-over" value="Confirm payment"/></td>
        </tr></div>
        <?php endif;?>
    </table>

</body>
</html>