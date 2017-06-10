<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/30/2017
 * Time: 5:41
 */
include '../includes/db.inc.php';
if(isset($_POST['new_customer'])) {
    try {
        $sqlNewCustom = "INSERT INTO customers(
            idCustom,
            nameCustom,
            phoneCustom,
            descriptionCustom
            ) VALUES (
            NULL,
            :nameCustom,
            :phoneCustom,
            :descriptionCustom
            )";

        $stmtNewCustom = $pdo->prepare($sqlNewCustom);

        $stmtNewCustom->bindParam(':nameCustom', $_POST['nameCustomer'], PDO::PARAM_STR);
        $stmtNewCustom->bindParam(':phoneCustom', $_POST['phoneCustomer'], PDO::PARAM_STR);
        $stmtNewCustom->bindParam(':descriptionCustom', $_POST['descCustomer'], PDO::PARAM_STR);
        $stmtNewCustom->execute();
    } catch (PDOException $e) {
        $error = 'Error adding submitted contact: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    echo "<script>
    location.href='http://foini/admin/';
    </script>";
    exit();
}
?>
