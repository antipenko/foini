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
                <p class="user__name text-center"> <?php echo  $userName->name; ?> </p>
                <a href="logout.html.php" class="button btn-exit">Выйти</a>
            </div>
            <nav class="sidebar__menu top-bar-section ">
                <ul class="menu vertical">
                    <li class="menu-item has-dropdown">
                        <a href="#" class="menu-item__link">Заказы</a>
                        <ul class="dropdown">
                            <li><a href="#">First link in dropdown</a></li>
                            <li class="active"><a href="#">Active link in dropdown</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="#" class="menu-item__link">Клиенты</a></li>
                    <li class="menu-item"><a href="#" class="menu-item__link">Калькулятор</a></li>
                    <li class="menu-item"><a href="#" class="menu-item__link">Статистика</a></li>
                </ul>
            </nav>
        </div>
        <div class="columns medium-10 main">
            <?php
            try {
                //$sql = 'SELECT staff.id, name, surname, birthday, phonenumber FROM staff  INNER JOIN phone ON staffid = staff.id ';
                $sql = 'SELECT users.id, login FROM users  INNER JOIN orders ON idAdmin = users.id ';
                $result = $pdo->query($sql);
            } catch (PDOException $e) {
                $error = 'Ошибка вывода контактов: ' . $e->getMessage();
                include 'error.html.php';
                exit();
            }
            //Enumeration of elements and write down to array $contacts with all fields
            foreach ($result as $row)
            {
                $contacts[] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'login' => $row['login']
                );
            }
            ?>
            <table class='table-contacts' border=1 >
                <tr>
                    <td>id</td>
                    <td>Name</td>
                    <td>login</td>
                    <!--  <td>Birthday</td>
                    <td>Phone</td> -->
                </tr>
                <?php $count = 0; ?>
                <?php foreach ($contacts as $contact): ?>

                    <tr >
                        <td><?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php $count=$count+1; ?>
                            <a href="#openModal" class="success button round buttonModale"  id="<?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>" data-open="modal-<?php echo "$count";  ?> ">+</a>
                            <span class="id_button" id="id" style="display: none;">   <?php// echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>  </span>
                            <?php echo htmlspecialchars($contact['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($contact['login'], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <!--  <td>

                <?php //$date = htmlspecialchars($contact['birthday'], ENT_QUOTES, 'UTF-8'); ?>
                <time datetime="<?php //echo $date; ?>"> <?php //echo $date; ?> </time>
              </td>
              <td>
                <?php //$tel = htmlspecialchars($contact['phonenumber'], ENT_QUOTES, 'UTF-8'); ?>
                <a href="tel:+ <?php //echo $tel ?> "> <?php //echo $tel?> </a>
              </td>-->
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>
