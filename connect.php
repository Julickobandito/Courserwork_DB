<?php

include('config.php');

try {
    $db = new PDO("mysql:host={$host};dbname={$db_name}", $user, $pass);
    $sth = $db->prepare('SET NAMES utf8');
    $sth->execute();
} catch(PDPException $e) {
    print($e->getMessage());
}
