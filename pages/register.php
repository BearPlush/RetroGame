<?php

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retro Game | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../sources/style/login.register.css">
</head>

<body>
    <!--
==============================================
                    HEADER
==============================================
-->

    <body>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost:81/test_php/RetroGame/pages/home.php">
                    <img src="../sources/img/RG_logo.png" alt="Logo" style="border-radius: 1000px;" width="30" height="24" class="d-inline-block align-text-top">
                    RetroGame
                </a>
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <a class="flex-sm-fill text-sm-center nav-link" href="http://localhost:81/test_php/RetroGame/pages/home.php"><img src="../sources/img/home.png" width="30" height="30"></a>
                    <a class="flex-sm-fill text-sm-center nav-link" href="http://localhost:81/test_php/RetroGame/pages/shop.php"><img src="../sources/img/shop.png" width="30" height="30"></a>
                    <a class="flex-sm-fill text-sm-center nav-link" href="http://localhost:81/test_php/RetroGame/pages/account.php"><img src="../sources/img/account.png" width="30" height="30"></a>
                </nav>
            </div>
        </nav>

        <!--
==============================================
                    LOGIN
==============================================
-->

        <div class="LOGINMASTER">
            <div class="box-register">
                <div class="form">
                    <h2>S'inscrire</h2>
                    <form action="../scripts/register.php" method="post">
                        <div class="field"><span>E-Mail</span><input type="text" name="mail" /></div>
                        <div class="field"><span>Mot De Passe</span><input type="password" name="pwd" /></div>
                        <div class="field-close"><span>Confirmation Mot De Passe</span><input type="password" name="pwdchk" /></div>
                        <div class="links">
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Mot de passe oublié</a>
                            <a href="http://localhost:81/test_php/RetroGame/pages/login.php">Se Connecter</a>
                        </div>
                        <p><input type="submit" value="S'inscrire"></p>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </body>

</html>