<?php

require_once 'libs/medoo.php';


function getDatabase(){
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'estorypi_web',
    'server' => 'localhost',
    'username' => 'estorypi_pavan',
    'password' => 'udupikrishna123',
    'charset' => 'utf8'
    ]);
return $database;
}


?>