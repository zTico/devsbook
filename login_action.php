<?php

    require_once 'config.php';
    require_once 'models/Auth.php';

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
  

    if ($email && $password){

        //Verficiar se o usuário está logado / tem cadastro
        $auth = new Auth($pdo, $base);
        
        if($auth->validadeLogin($email, $password)) {
            header("Location:".$base);
            exit;
        }

    } 

    $_SESSION['flash'] = 'E-mail e/ou Senha errados';
    header("Location:".$base."login.php");
    exit;
