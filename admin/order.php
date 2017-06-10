<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/30/2017
 * Time: 3:27
 */
?>
<?php include '../includes/db.inc.php'; ?>
<?php include 'header.html.php'; ?>



<main class="admin">
    <div class="row">
        <div class="columns medium-2 float-left sidebar">
            <div class="user">
                <img src="/img/user-avatar.jpg" alt="<?php echo $userName->name; ?>" class="user__photo text-center">
                <p class="user__name text-center"> <?php echo $userName->name; ?> </p>
                <a href="logout.html.php" class="button btn-exit">Выйти</a>
            </div>
            <nav class="sidebar__menu top-bar-section ">
                <ul class="menu vertical">
                    <li class="menu-item has-dropdown">
                        <a href="http://foini/admin/" class="menu-item__link">Заказы</a>
                    </li>
                    <li class="menu-item"><a href="http://foini/admin/" class="menu-item__link" id="btnCustomers">Клиенты</a></li>
                    <li class="menu-item"><a href="http://foini/admin/" class="menu-item__link">Калькулятор</a></li>
                    <li class="menu-item"><a href="http://foini/admin/" class="menu-item__link">Статистика</a></li>
                </ul>
            </nav>
        </div>
        <div class="columns medium-10 main">
            <?php
            $id = $_GET["id"];
            if (!empty($_GET["id"])) {
                try {
                    $queryOrder = "SELECT orders.idOrder, customers.nameCustom, users.name, typePaper, description, orders.count, price  FROM orders  
                        INNER JOIN users ON users.id = orders.idAdmin 
                        INNER JOIN customers ON customers.idCustom = orders.idCustomer 
                        WHERE idOrder=$id";
                    $result = $pdo->query($queryOrder);

                } catch (PDOException $e) {
                    $error = 'Ошибка вывода заказа: ' . $e->getMessage();
                    include 'error.html.php';
                    exit();
                }
                foreach ($result as $row) {
                    $order[] = array(
                        'nameCustom' => $row['nameCustom'],
                        'nameAdmin' => $row['name'],
                        'typePaper' => $row['typePaper'],
                        'description' => $row['description'],
                        'count' => $row['count'],
                        'price' => $row['price']
                    );
                }
            }
            ?>
            <?php
            foreach ($order as $row) { ?>
                <h2>
                    <?php echo htmlspecialchars($row['nameCustom'], ENT_QUOTES, 'UTF-8'); ?>
                </h2>
                <p>
                    <?php echo "Оформил заказ: " . htmlspecialchars($row['nameAdmin'], ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <i>
                    <?php echo htmlspecialchars($row['typePaper'], ENT_QUOTES, 'UTF-8'); ?>
                </i>
                <p>
                    <?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <p>
                    <?php echo htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . " грн"; ?>
                </p>



            <?php  } ?>
        </div>
    </div>
</main>