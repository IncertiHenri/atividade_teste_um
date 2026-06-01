<?php

    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();
    // sair do sistema, literalmente destruindo
?>