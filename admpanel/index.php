<?php
require '../includes/db.php';
include 'header.html.php';
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 0:54
 */
?>

<?php


if (isset($_SESSION['logged_user'])): ?>
    <?php $userName = $_SESSION['logged_user']->name; ?>
    <?php //echo $_SESSION['logged_user']->name; ?>
    <?php include 'index.html.php' ;?>
<?php else : ?>

    <script>
        location.href='http://foini/admpanel/login.html.php';
    </script>
    //include 'login.html.php';

<?php endif; ?>

<?php include 'footer.html.php'; ?>

