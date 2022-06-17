<?php
include('connect.php');
// handle change data logic

$overweight = [];

function saveLuggaggeUnitRedirect($db) {

  /*var_dump([
      $_REQUEST['id'], $_REQUEST['Weight'], $_REQUEST['AmountOfPlaces'],
  ]);
  exit;*/

    $sql="
    INSERT INTO luggageunit (TicketId, Weight, AmountOfPlaces)
    VALUES ({$_REQUEST['id']},{$_REQUEST['Weight']}, {$_REQUEST['AmountOfPlaces']} )";
    $sth = $db->exec($sql);

    session_start();
    $filter = http_build_query($_SESSION["filter"]);

    header('Location: registration_luggage.php?'.$filter);
}

if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
} else {
    print "'id' is not defined!";
    exit;
}

if ($id && isset($_REQUEST['submit']))
{
    $weight = empty($_REQUEST['Weight']) ? 0 : $_REQUEST['Weight'];
    $places = empty($_REQUEST['AmountOfPlaces']) ? 0 : $_REQUEST['AmountOfPlaces'];
    $sth = $db->query("
    SELECT
           a.LuggageAllowancePerPerson,
           a.ExtraPoundsLuggageCost
    FROM
          ticket t
            inner join flight f on t.FlightId = f.Id
            inner join airplane a on f.PlaneCode = a.Id
     WHERE t.Id = {$id}
    ");
    $data = $sth->fetch();

    if ($data && (floatval($_REQUEST['Weight']) - floatval($data['LuggageAllowancePerPerson'])) > 0) {
        $overweight = floatval($_REQUEST['Weight']) - floatval($data['LuggageAllowancePerPerson']);
        $over = [
            'weight' => $overweight,
            'price' => round($overweight*$data['ExtraPoundsLuggageCost'], 1),
        ];
        $data['Weight'] = $_REQUEST['Weight'];
        $data['AmountOfPlaces'] = $_REQUEST['AmountOfPlaces'];
    } else {
        saveLuggaggeUnitRedirect($db);
    }

} else {
    $data = [
        'Id' => '',
        'Weight' => '',
        'AmountOfPlaces' => '',
        'LuggageAllowancePerPerson' => '',
        'ExtraPoundsLuggageCost' => ''
    ];
}

if(!empty($_REQUEST['submit-over'])){
    saveLuggaggeUnitRedirect($db);
}

include('form_luggage.php');