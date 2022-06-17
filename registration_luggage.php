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
<style>
    body{
        background: rgb(252, 189, 150);
    }

    tr th{
        color: white;
        background:  #260e72;
        padding-left: 2%;
        text-align: left;
    }
    tr td{
        padding-left: 2%;
        color: #260e72;
    }
    tr:hover{
        transition: 0.3s;
        background: rgb(250, 219, 199);
    }
    tbody{
        background: rgba(229, 134, 79, 0.48);
    }
    a{
        text-decoration: none;
    }
    input{
        height: 20px;
    }
    form input{
        background: none;
        border: 2px solid rgb(250, 219, 199);
        color: white;
        margin-bottom: 3%;
    }
    #inputting{
        margin: 0 auto;
        width: 90%;
    }
    .tickets{
        width: 100%;
    }

    #flight{
        width: 40px;
    }
    #submit, #reset{
        border: 2px solid #260e72;
        font-weight: 600;
        height: 28px;
        width: 100px;
        background: #260e72;
        color: white;
    }
    #submit:hover, #reset:hover{
        transition: 1s;
        background: none;
        border: 2px solid #260e72;
        color: #260e72 ;
    }
    #return{
        text-decoration: none;
        font-weight: 600;
        color: #260e72;
    }
    p{ margin-bottom: 2%;}
    .register{
        color: #cb2525;
    }
    h2, img{
        margin: 0;
    }
    .flex{
        display: flex;
        justify-content: space-between;
        margin-right: 2%;
        margin-left: 2%;
    }
    form{
        margin-top: 4%;
    }
</style>
</body>
</html>

<?php

include('connect.php');

function getList($db, $params){
    $where = filter( [
        'FlightId' => $params['FlightId'],
        'TicketNum' =>$params['TicketNum'],
        'Name' => $params['Name'],
        'Surname' => $params['Surname']
    ]);

    $sql = "Select ticket.Id, ticket.ticketNum,passenger.Name, passenger.Surname, luggageunit.Id as luggage from ticket join passenger on ticket.P_Id = passenger.Id
left join luggageunit on ticket.Id = luggageunit.TicketId  WHERE RegistrationCheck = 1 AND ". $where;

    $sth = $db->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

    ?>

<div id="inputting">
    <div class="flex">
        <h2>Luggage</h2>
        <a href="Menu.php"><img width="25" src="img/menu.svg" alt="menu"></a></div>
    <form name="" method="get" action="registration_luggage.php">
        <input type="text" name="FlightId" placeholder="Flight" id="flight" value="<?= $_REQUEST['FlightId']?>" maxlength="5">
        <!--<label for="ticketNum"> Ticket №</label>-->
        <input type="text" name="ticketNum"  placeholder="Ticket" id="ticketNum" value="">
        <!--<label for="FirstName"> Name</label>-->
        <input type="text" name="FirstName" placeholder="First name" id="FirstName" value="">
        <!--<label for="Surname"> Surname</label>-->
        <input type="text" name="Surname" placeholder="Last name" id="Surname" value="">
        <input id="submit" type="submit" name="submit" value="Submit"/>
        <input id="reset" type="submit" name="reset" value="Reset"/> <br>
        <?php
        if(empty($_REQUEST['FlightId'])) {
            print "Please, define Flight id";
            exit;
        }
        ?>

    <table class="tickets">
        <tr>
            <th class="ticketNum">Ticket number</th>
            <th class="PName">Name</th>
            <th class="PLastName">Last name</th>
            <th class="RegistrationCheck">Registration Check</th>
        </tr>

    <?php foreach ($rows as $row): ?>
    <tbody>
        <tr id="main">
         <td class="ticketNum"><?=$row['ticketNum']?></td>
         <td class="PName"><?=$row['Name']?></td>
         <td class="PLastName"><?=$row['Surname']?></td>
       <?php if(! is_null($row['luggage'])){?> <td class="RegistrationLuggage">Registered</td><?php ;}
               else {?> <td class="but-register"><a class="register" href="luggage_edit.php?id=<?=$row['Id']?>">Register luggage</a></td>
        </tr>
    </tbody>
    </div>
    <?php ;}
     endforeach; ?>
    </table>

    </form>
<?php

}

function filter($params){
    $F_Id = $params['FlightId'];
    $F_TicketNum = $params['TicketNum'];
    $F_Name = $params['Name'];
    $F_LastName = $params['Surname'];
    $where = "ticket.FlightId =  " . $params['FlightId'] ;
    if (!empty($F_TicketNum)){
        $where = $where. " and ticket.ticketNum =" . "'" . $params['TicketNum'] . "'";
    }
    if (!empty($F_Name)){
        $where = $where. " and passenger.Name =" . "'" . $params['Name'] . "'";
    }
    if (!empty($F_LastName)){
        $where = $where. " and passenger.Surname =" . "'" . $params['Surname'] . "'";
    }

    return $where;
}

$FId = $_REQUEST['FlightId'];
$FTicket = !empty($_REQUEST['ticketNum']) ? $_REQUEST['ticketNum'] : '';
$FName = !empty($_REQUEST['FirstName']) ? $_REQUEST['FirstName'] : '';
$FSurname =!empty($_REQUEST['Surname']) ? $_REQUEST['Surname'] :  '';

$filter = [
    'FlightId' => $FId,
    'TicketNum' => $FTicket,
    'Name' => $FName,
    'Surname' => $FSurname
];

session_start();
$_SESSION["filter"] = $filter;

getList($db, $filter);
