<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/13/2017
 * Time: 2:51
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
                        <a href="#" class="menu-item__link">Заказы</a>
                        <ul class="dropdown">
                            <li><a href="#" id="btnOrders">Все заказы</a></li>
                            <li><a href="#" id="btnMyOrders">Мои заказы</a></li>
                            <li><a href="#" id="btnNewOrders">Новый заказ</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-item__link" id="btnCustomers">Клиенты</a>
                        <ul class="dropdown">
                            <li><a href="#" id="btnNewCustomer">Новый клиент</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="#" class="menu-item__link">Калькулятор</a></li>
                    <li class="menu-item"><a href="#" class="menu-item__link">Статистика</a></li>
                </ul>
            </nav>
        </div>
        <div class="columns medium-10 main">
            <!--Владух, этоужаснейший говнокод.
                в Try у тебя несколько переменных с различными запросами. И получение результатов этих запросов.
                Дальше идут циклы foreach в которых ты создаешь массивы с результатами каждого запроса.
            -->
            <?php
            try {
                $allOrders = 'SELECT orders.idOrder, description, users.name FROM orders  INNER JOIN users ON users.id = orders.idAdmin';
                $result = $pdo->query($allOrders);

                $ordersAdmin = 'SELECT orders.idOrder, description, price FROM orders WHERE idAdmin=1';
                $resultOrdersAdmin = $pdo->query($ordersAdmin);

                $allCustomers = 'SELECT customers.idCustom, nameCustom, phoneCustom FROM customers ';
                $resultAllCustomers = $pdo->query($allCustomers);

            } catch (PDOException $e) {
                $error = 'Ошибка вывода контактов: ' . $e->getMessage();
                include 'error.html.php';
                exit();
            }
            //Enumeration of elements and write down to array $contacts with all fields
            foreach ($result as $row) {
                $contacts[] = array(
                    'id' => $row['idOrder'],
                    'name' => $row['description'],
                    'login' => $row['name']
                );
            }

            foreach ($resultOrdersAdmin as $row1) {
                $myOrders[] = array(
                    'id' => $row1['idOrder'],
                    'description' => $row1['description'],
                    'price' => $row1['price']
                );
            }

            foreach ($resultAllCustomers as $row2) {
                $customers[] = array(
                    'id' => $row2['idCustom'],
                    'nameCustom' => $row2['nameCustom'],
                    'phoneCustom' => $row2['phoneCustom']
                );
            }

            ?>
            <!--
                тут ты создаешь section>table для каждой таблицы с результатами твоих запросов
                и в цикле выводишь как то строки.
                Таблицы по умолчанию скрыты. при нажатии на соответствующий пункт в меню (на нем есть id)
                у тебя отображается таблица (тоже с id - id-шники связаны по названию). Это реализовано в файле admin.js
                СДАЙ КУРСАЧ ТАК (ЛИШЬ БЫ РАБОТАЛО), НО ПОЗЖЕ ОБЯЗАТЕЛЬНО ПЕРЕДЕЛАЙ!!!!
            -->
            <section class="table hide" id="orders">
                <table class='table-contacts' border=1 id="grid">
                    <thead>
                    <tr>
                        <th data-type="number">id</th>
                        <th data-type="string">description</th>
                        <th data-type="string">Администратор</th>
                    </tr>
                    </thead>
                    <?php $count = 0; ?>
                    <?php foreach ($contacts as $contact): ?>

                        <tr>
                            <td><?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php $count = $count + 1; ?>
                                <a href="order.php?id= <?php echo $contact['id'] ?>" class="success button round buttonModale"
                                   id="<?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                   data-open="modal-<?php echo "$count"; ?> ">+</a>
                                <span class="id_button" id="id"
                                      style="display: none;">   <?php // echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>  </span>
                                <?php echo htmlspecialchars($contact['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($contact['login'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </section>
            <section class="table hide" id="myOrders">
                <table class='table-contacts' border=1 id="grid">
                    <thead>
                    <tr>
                        <th data-type="number">id</th>
                        <th data-type="string">Описание заказа</th>
                        <th data-type="number">Цена</th>
                    </tr>
                    </thead>
                    <?php $count = 0; ?>
                    <?php foreach ($myOrders as $myOrder): ?>

                        <tr>
                            <td><?php echo htmlspecialchars($myOrder['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php $count = $count + 1; ?>
                                <a href="order.php?id= <?php echo $myOrder['id'] ?> "
                                   class="success button round buttonModale"
                                   id="<?php echo htmlspecialchars($myOrder['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                   data-open="modal-<?php echo "$count"; ?> ">+</a>
                                <span class="id_button" id="id"
                                      style="display: none;">   <?php // echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>  </span>
                                <?php echo htmlspecialchars($myOrder['description'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($myOrder['price'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                </table>
            </section>
            <section class="table hide" id="customers">
                <table class='table-contacts' border=1 id="grid">
                    <thead>
                    <tr>
                        <th data-type="number">id</th>
                        <th data-type="string">Имя/Название</th>
                        <th>Номер телефона</th>
                    </tr>
                    </thead>
                    <?php $count = 0; ?>
                    <?php foreach ($customers as $custom): ?>

                        <tr>
                            <td><?php echo htmlspecialchars($custom['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php $count = $count + 1; ?>
                                <a href="#openModal" class="success button round buttonModale"
                                   id="<?php echo htmlspecialchars($custom['nameCustom'], ENT_QUOTES, 'UTF-8'); ?>"
                                   data-open="modal-<?php echo "$count"; ?> ">+</a>
                                <span class="id_button" id="id"
                                      style="display: none;">   <?php // echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>  </span>
                                <?php echo htmlspecialchars($custom['nameCustom'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <?php $tel = htmlspecialchars($custom['phoneCustom'], ENT_QUOTES, 'UTF-8'); ?>
                                <a href="tel:+ <?php echo $tel ?> "> <?php echo $tel ?> </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </section>
            <section id="newOrder" class="hide">
                <form action="newPost.php" method="post" class="order-new">
                    <select name="customer" id="">
                        <?php foreach ($customers as $custom) { ?>
                            <option value=" <?php echo $custom['id']; ?> ">
                                <?php echo $custom['nameCustom']; ?>
                            </option>
                        <?php } ?>

                    </select>

                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="text" class="hide" name="idAdmin" value="<?php echo $userName->id; ?>">
                    <label for="count">Количество</label>
                    <input type="number" name="count" value="10">
                    <input type="text" name="typePaper" placeholder="Тип Бумаги">
                    <textarea name="desc" id="" cols="30" rows="10" style="color:#000;">Описание</textarea>
                    <input type="text" value="" placeholder="Стоимость" name="price">
                    <input type="submit" name="new_order" value="Добавить" class="button">
                </form>
            </section>

            <section id="newCustomer" class="hide">
                <form action="newCustom.php" method="post" class="customer-new">
                    <label for="nameCustomer">Имя/Название</label>
                    <input type="text" name="nameCustomer" value="">
                    <label for="phoneCustomer">Номер телефона</label>
                    <input type="text" name="phoneCustomer" value="">
                    <textarea name="descCustomer" id="" cols="30" rows="10" style="color:#000;"
                              placeholder="Описание.."></textarea>
                    <input type="submit" name="new_customer" value="Добавить" class="button">
                </form>
            </section>

        </div>
    </div>
</main>
