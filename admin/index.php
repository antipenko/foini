<?php include 'header.html.php';
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 0:54
 */
require '../includes/db.inc.php';
echo var_dump($_SESSION);
echo $_SESSION['logged_user'];
if( isset($_SESSION['logged_user']) ):
    echo '<h1>Авторизован</h1>';
    else :
    echo '<a href="login.html.php">Авторизоваться</a>';
endif;

if (isset($_SESSION['logged_user']))
 include 'footer.html.php';

