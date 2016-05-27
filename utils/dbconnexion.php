<?php
require_once(realpath(dirname(__FILE__))."/../database/dbconf/dbconf.php");
global $config;
$pdo = new PDO($config['host'],
               $config['user'],
               $config['password']);

$pdo->query("SET NAMES UTF8");//Encodage UTF8

return $pdo;