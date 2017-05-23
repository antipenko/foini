<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 5/12/2017
 * Time: 2:30
 */
?>
<?php include 'header.html.php'; ?>

<?php include '../includes/db.inc.php'; ?>

<?php
// получаю данные из формы
    $data = $_POST;
// if form have submitted record values from form in variables
// submite query to db, find row in table 'users' with login and pass coinciding with variables
// and record in $num-rows users id.
    if(isset($data['do_login'])){
        $login = $_POST["login"];
        $pass = $_POST["password"];

        $column = $pdo->query("SELECT users.name FROM users WHERE login='".$login ."' AND password='" . $pass."'");
        $user = $column->fetchColumn();
        echo $user;
        if ($column > 0) {
            print "success=1";
            $_SESSION['logged_user'] = $user;
            $userName= $_SESSION['logged_user'];
            echo "<div style='color:red;'>вы авторизованы $user <a href='.'>сюда</a></div>";
        } else {
            print "success=0";
        }
    }
?>

<body>
<main>
    <div class="row">
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
                <i class="fa fa-user" aria-hidden="true"></i>
            </p>

            <p class="submit">
                <button type="submit" name="do_login">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </p>
        </form>
    </div>
</main>

<?php include 'footer.html.php' ?>

