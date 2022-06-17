<?php
include('connect.php');

if(isset($_REQUEST['Id']) && is_numeric($_REQUEST['Id'])) {
    $sth = $db->exec("DELETE FROM airplane WHERE Id = {$_REQUEST['Id']}");
}

header('Location: airplane.php');
