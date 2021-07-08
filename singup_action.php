<?php

require_once 'config.php';
require_once 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$birthdate = filter_input(INPUT_POST, 'birthdate'); //  00/00/0000

if($name && $email && $password && $birthdate) {
    $auth = new Auth($pdo, $base);

    $birthdate = explode('/', $birthdate);
    
    if(count($birthdate) != 3){
        $_SESSION['flash'] = 'Data invalida';
        header('Location:'.$base.'singup.php');
        exit;
    }
    
    $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];

    if(strtotime($birthdate) === false) {
        $_SESSION['flash'] = 'Data invalida';
        header('Location:'.$base.'singup.php');
        exit;
    }

    if($auth->emailExists($email) === false) {
        $auth->registerUser($name,$email,$password,$birthdate);
        header('Location:'.$base);
        exit;

    } else {
        $_SESSION['flash'] = 'Email já cadastrado';
        header('Location:'.$base.'singup.php');
        exit;
    }

}

$_SESSION['flash'] = 'Preencha todos os dados';
header('Location:'.$base.'singup.php');
exit;