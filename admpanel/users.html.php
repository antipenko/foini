<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 2:48
 */

include 'header.html.php';

include '../includes/db.php';

// create $result and define him values from table users
try
{
    $sql = 'SELECT users.id, name, login FROM users ';
    $result = $pdo->query($sql);
}
//if we have error, go to error page and exit
catch (PDOException $e)
{
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

<?php include 'footer.html.php'; ?>