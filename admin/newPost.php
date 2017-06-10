<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/29/2017
 * Time: 22:37
 */
include '../includes/db.inc.php';
$newOrderData = $_POST;
$idAdmin = $userName->id;
$date=date('Y-m-d');
echo $userName->id;
if (isset($_POST['new_order'])) {
    //echo "<script> alert('kyky' );</script>";
    try {
        $sql = "INSERT INTO orders(idOrder,
            idCustomer,
            file,
            typePaper,
            orders.count,
            description,
            idAdmin,
            dateRegistration,
            price
            ) VALUES (
            NULL,
            :idCustomer,
            :file,
            :typePaper,
            :count,
            :description,
            :idAdmin,
            :dateRegistration,
            :price
            )";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idCustomer', $_POST['customer'], PDO::PARAM_STR);
        $stmt->bindParam(':file', $_POST['fileToUpload'], PDO::PARAM_STR);
        $stmt->bindParam(':typePaper', $_POST['typePaper'], PDO::PARAM_STR);
        $stmt->bindParam(':count', $_POST['count'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $_POST['desc'], PDO::PARAM_STR);
        $stmt->bindParam(':idAdmin', $_POST['idAdmin'], PDO::PARAM_STR);
        $stmt->bindParam(':dateRegistration', $date, PDO::PARAM_STR);
        $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        $error = 'Error adding submitted contact: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    echo "<script>
    location.href='http://foini/admin/';
    </script>";
    //exit();
}
?>
