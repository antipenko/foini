<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/13/2017
 * Time: 2:51
 */
?>
<main class="admin">
    <div class="row">
        <div class="columns medium-2 float-left sidebar">
            <div class="user">
                <img src="/img/user-avatar.jpg" alt="<?php echo $userName ?>" class="user__photo text-center">
                <p class="user__name text-center"> <?php echo $userName ?> </p>
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
        <div class="columns medium-10 main"></div>
    </div>
</main>
