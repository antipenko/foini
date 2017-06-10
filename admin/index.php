<?php
require '../includes/db.php';
include 'header.html.php';
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 0:54
 */

if (isset($_SESSION['logged_user'])):
    $userName = $_SESSION['logged_user'];
    include 'index.html.php';
else : ?>
    <script>
location.href='http://foini/adminpanel/login.html.php';
    </script>
<?php
endif;
include 'footer.html.php';

