<?php
require('../config.php');

if ( empty($_SESSION[$AUTH_USER['session']]) ){
    // not authenticated
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        // login data received
        if ($_POST['user']==$AUTH_USER['user'] && $_POST['pass']==$AUTH_USER['pass']) {
            // correct data
            $_SESSION[$AUTH_USER['session']] = $AUTH_USER['user'];
            header('Location: /auth/login.php');
        }
        else {
            // incorrect data
            ?>
            <div style="color:red">Incorrect data</div>
            <?php
        }
    }
    ?>
    <form method="POST">
        <div>User: <input type="text" name="user" /></div>
        <div>Password: <input type="password" name="pass" /></div>
        <div><input type="submit" value="Login" /></div>
    </form>
    <?php
}
else {
    ?>
        You are logged in as <?= $_SESSION[$AUTH_USER['session']]?>!<br/>
        Click <a href="/auth/logout.php">here</a> for logout.
    <?php
}
?>
