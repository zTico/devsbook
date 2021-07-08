<?php require_once 'config.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$base?>assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base?>"><img src="<?=$base?>assets/images/devsbook_logo.png" /></a>
        </div>
    </header>    

    
    <section class="container main">

        <form method="POST" action="<?=$base?>singup_action.php">

            <?php if(isset($_SESSION['flash'])): ?>
                <div style="margin-bottom: 10px"><?= $_SESSION['flash'] ?></div>
            <?php $_SESSION['flash'] = ''; endif ?>

            <input placeholder="Digite seu nome completo" class="input" type="text" name="name" />

            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua senha" class="input" type="password" name="password" />

            <input placeholder="Digite sua data de nascimento" class="input" type="text" name="birthdate" id="birthdate"/>

            <input style="margin-top: 15px;" class="button" type="submit" value="Cadastrar"/>

            <a href="<?=$base?>login.php">Já tem conta? Faça o Login</a>
        </form>
    </section>    
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById("birthdate"),
        {mask:'00/00/0000'}
    );
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>