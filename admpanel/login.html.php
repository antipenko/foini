<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 2:30
 */
?>
<?php include 'header.html.php'; ?>
<?php require '../includes/db.php'; ?>

<?php
// получаю данные из формы
    $data = $_POST;
// if form have submitted record values from form in variables
// submite query to db, find row in table 'users' with login and pass coinciding with variables
// and record in $num-rows users id.
    if (isset($data['do_login']))
    {
        $errors = array();
        $user = R::findOne('users', 'login = ?',
            array($data['login']));
        if($user)
        {
            // if login exist
            if($data['password'] === $user->password) : ?>
                <<script>
                    location.href='http://foini/admpanel/';
                </script>
               <?php $_SESSION['logged_user'] = $user; ?>
            <?php else :
                $errors[] = 'Пароль не верный';
            endif;
        } else
        {
            $errors[] = 'Пользователь не найден!';
        }
        if (!empty($errors))
        {
            echo '<div style="color:red">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<body>
<main class="page-login">
    <div class="row text-center">
        <h2>Авторизация</h2>

        <form class="form-login" action="login.html.php" method="post">
            <!-- Name -->
            <p class="field">
                <input type="text" name="login" placeholder="Login">
                <i class="fa fa-user" aria-hidden="true"></i>
            </p>
            <!-- SurName -->
            <p class="field">
                <input type="password" name="password" placeholder="password">
                <i class="fa fa-key" aria-hidden="true"></i>
            </p>

            <p class="submit">
                <button type="submit" name="do_login">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </p>
        </form>
        <a href="/" class="ba-logo"><img src="/img/logo.png"></a>
    </div>
</main>

<?php include 'footer.html.php' ?>

