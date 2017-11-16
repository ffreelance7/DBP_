<?php
    /* Empezamos la sesión */
    session_start();

    /* Creamos la sesión */
    $_SESSION['user'] = $_POST['suggest'];

    echo $_SESSION['user'];
?>
