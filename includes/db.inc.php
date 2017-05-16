<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 1:07
 */
// set up connection to db
$host = '127.0.0.1';
$db   = 'foini';
$user = 'mysql';
$pass = 'mysql';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
//object $pdo is my connection
$pdo = new PDO($dsn, $user, $pass, $opt);