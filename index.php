<?php

    require_once 'config.php';
    require_once 'models/Auth.php';

    //Verficiar se o usuário está logado
    $auth = new Auth($pdo, $base);
    $userInfo = $auth->checkToken();

    echo 'index';

    