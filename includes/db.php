<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 16:47
 */
require '../libs/rb.php';

$host = '127.0.0.1';
$db   = 'foini';
$user = 'mysql';
$pass = 'mysql';
$charset = 'utf8';

R::setup( 'mysql:host=localhost;dbname=foini',
    'mysql', 'mysql');
session_start(); ?>
