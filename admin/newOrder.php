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
//$cust = $_POST['customer'];
if (isset($_POST['new_order'])) {
    echo "<script> alert('kyky' );</script>";
    try {
        $customer = $pdo->quote($_POST['customer']);
        $file = $pdo->quote($_POST['fileToUpload']);
        $count = $pdo->quote($_POST['count']);
        $typePaper = $pdo->quote($_POST['typePaper']);
        $desc = $pdo->quote($_POST['desc']);
        $price = $pdo->quote($_POST['price']);
       //$s = $pdo->prepare('INSERT INTO orders (idOrder, idCustomer, file, typePaper, count, description, idAdmin, dateRegistration, ready, price VALUES (NULL, $customer, $file, $typePaper, $count, $desc, $userName->id, date(), 0, $price);');
//        $s->execute();
        //$s = $pdo->prepare("INSERT INTO orders (idOrder, idCustomer, typePaper, orders.count, description, idAdmin, dateRegistration, ready, price) VALUES (NULL, '1', 'a4', '20', 'описание 2', '2', '2017-05-30', '0', '100');");
       // $s->execute();
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
// use PARAM_STR although a number
        $stmt->bindParam(':count', $_POST['count'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $_POST['desc'], PDO::PARAM_STR);
        $stmt->bindParam(':idAdmin', $_POST['idAdmin'], PDO::PARAM_STR);
        $stmt->bindParam(':dateRegistration', $date, PDO::PARAM_STR);
       // $stmt->bindParam(':ready', '0', PDO::PARAM_STR);
// use PARAM_STR although a number
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