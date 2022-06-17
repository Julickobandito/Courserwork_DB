<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background: rgb(252, 189, 150);
        }
        .wrapper{
            text-align: center;
            margin: 0 auto;
            width: 70%;
            padding: 2%;
            background: rgba(229, 134, 79, 0.48);
            margin-top: 5% ;
            border-radius: 2px;
        }
        #flight{
            margin-bottom: 2%;
            margin-right: 5%;
        }
        #btn{

            margin-top: 3%;
            width: 250px;
            height: 40px;
            border-radius: 2px;
            background: #190748;
            color: white;
            border: none;
            font-weight: 700;
        }
        #btn:hover{
            transition: 1s;
            background: none;
            border: 2px solid #190748;
            color: #190748 ;

        }
        h2 + form{
            margin: 4%;
        }
        #link{
            margin-left: 3%;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <div class="wrapper">
        <h2>Adding new passengers tickets to database</h2>
        <form id="load_form" enctype="multipart/form-data" action="load.php" method="POST">
            <label for="flight">Input flight number:</label>
            <input type="text" id="flight" name="flight" value="">
            <label for="date">Input flight date:</label>
            <input type="text" id="date" name="date" value=""> <br>
            <input  type="file" name="csvfile">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" /> <br>
            <input type="submit" id="btn" value="Load" />
        </form>
    </div>
</body>
</html>

<?php
if(!isset($_FILES['csvfile'])){
    exit;
}

$uploaddir = 'C:\\OpenServer\\domains\\localhost\\coursework\\';
$uploadfile = $uploaddir . 'tickets.csv';

echo '<pre>';
if (move_uploaded_file($_FILES['csvfile']['tmp_name'], $uploadfile)) {
    echo "File was loaded correctly.\n";
} else {
    echo "Something went wrong\n";
}
print "</pre>";


include('connect.php');


function insertToPassenger($db, $params)
{

    $sql = "INSERT INTO passenger (Name, Surname, DocNumber, DocType) VALUES (" .
        "'" . $params['name'] . "'," .
        "'" . $params['surname'] . "'," .
        "'" . $params['docnum'] . "'," .
        "'" . $params['doctype'] . "'" .
        ")";


    $sth = $db->exec($sql);

    $id = $db->lastInsertId();

    return $id;
}


function insertToTicket($db, $params)
{

    $sql2 = "INSERT INTO ticket (P_Id, ticketNum, SeatNum, FlightId, RegistrationCheck, SumOfLuggagePayment,  LuggageRegistrationCheck) VALUES(" .
        "'" . $params['pId'] . "'," .
        "'" . $params['ticketNum'] . "'," .
        "'" . $params['seatNum'] . "'," .
        "'" . $params['flightId'] . "'," .
        "'" . $params['registrationCheck'] . "'," .
        "'" . $params['sumOfLuggagePayment'] . "'," .
        "'" . $params['LuggageRegistrationCheck'] . "'" .
        ")";


    $sth = $db->exec($sql2);

    $id2 = $db->lastInsertId();

    return $id2;
}

function getFlightId($db, $params)
{
    if (isset($params['FlightNum']) && is_numeric($params['FlightNum'])) {
        $sql = "
            SELECT Id from flight WHERE FlightNum = " . "'" . $params['FlightNum'] . "'" . " and DepartureTime = " . "'" . $params['DepartureTime'] . "'" . "
		";
        $sth = $db->query($sql);
        if ($row = $sth->fetch()) {
            return $row['Id'];
        }
        return -1;
    }

}


function loadTicket($db, $params)
{
    $FId = getFlightId($db, [
        'FlightNum' => $params['FlightNum'],
        'DepartureTime' => $params['DepartureTime']
    ]);
    if ($FId != -1) {
        $row = 1;

        if (($handle = fopen($params['fileName'], "r")) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) { // 0, ","
                $num = count($data);
                $row++;
                $p_id = insertToPassenger($db, [
                    'name' => $data[1],
                    'surname' => $data[2],
                    'doctype' => $data[3],
                    'docnum' => $data[4]]);
                if ($p_id != -1) {
                    insertToTicket($db, [
                            'pId' => $p_id,
                            'ticketNum' => $data[0],
                            'seatNum' => $data[5],
                            'flightId' => $FId,
                            'registrationCheck' => 0,
                            'sumOfLuggagePayment' => 0,
                            'LuggageRegistrationCheck' => 0
                        ]
                    );
                }

            }
            fclose($handle);
        } else {
            print ':(';
        }
    } else {
        print '-';
    }
}

loadTicket($db, [
    'FlightNum' => $_POST['flight'],
    'DepartureTime' => $_POST['date'],
    'fileName' => $uploadfile
]);

?>

