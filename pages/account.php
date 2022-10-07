<?php
session_start();
if (!isset($_SESSION['mail'])) {
  header('Location: http://localhost:81/test_php/RetroGame/pages/register.php');
  die();
}

try {
  $bdd = new PDO('mysql:host=localhost:3307;dbname=retrogame_db;charset=utf8', 'root', 'root');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
} catch (Exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}

$mail = $_SESSION['mail'];
try {
  $datas = array(':mail' => $mail);
  $checkDB = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
  $checkDB->execute(array($mail));
  $datas = $checkDB->fetch();
} catch (Exception $e) {
  echo " Erreur ! " . $e->getMessage();
  echo " Les datas : ";
  print_r($datas);
}
if ($datas[4] = 'NULL') {
  $datas[4] = "Utilisateur";
}

?>



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Retro Game | account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="../sources/style/account.css">
</head>


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
                    HEADER
==============================================
-->
  <div class="box-account">
    <div class="bo-box">
      <div class="box-info">
        <?php

        echo "<h1> Informations du compte </h1></ br>
            <p class='info'>ID : ' $datas[0] '</p></ br>
            <p class='info'>Pseudo : ' $datas[1] '<form action='../pages/rename.php' method='post'><input type='submit' value='Changer'></p></form>
            <p class='info'>E-Mail : ' $datas[2] '<form action='../pages/remail.php' method='post'><input type='submit' value='Changer'></p></form>
            <p class='info'>Statut : ' $datas[4] '</p></ br>
            <p class='info'>Date de création : ' $datas[5] '</p></ br>"
        ?>
      </div>
      <div class="box-orders">
        <?php

        echo "<h1> Commandes en cours </h1></ br>"

        ?>
      </div>
    </div>
    <div class="bo-box">
      <div class="box-contact">
        <h1> Nous contacter</h1>
        </ br>
        <form action='../scripts/contact.php' method='post'>
          <div class='field'><span>Titre</span><input type='text' name='title' /></div>
          <div class='field-a'><span>Rentrer votre message</span><input type='text' name='text' /></div>
          <p><input type='submit' value='Envoyez'></p>
        </form>

      </div>
    </div>
    <div class='bo-box'>
      <div class='box-seller'>
        <h1>gestion des ventes</h1>
        <div class='bo-box'>
          <div class="box-additem">
            <h2>Ajouter un produit</h2>
            <form action='../scripts/additem.php' method='post'>
              <div class='field'><span>Nom</span><input type='text' name='named' /></div>
              <div class='field'><span>Prix</span><input type='text' name='price' /></div>
              <div class='field'><span>Editeur</span><input type='text' name='editor' /></div>
              <div class='field'><span>Console</span><input type='text' name='machine' /></div>
              <div class="bo-box">
              <div class='field'><span>category</span><input type='text' name='statut' /></div>
              <div class='field'><span>état</span><input type='text' name='category' /></div>
                <input class='button-seller' type='submit' value='Ajouter'>
              </div>
            </form>
          </div>
          <div class="box-manageitem">
            <h2>Gerer vos ventes</h2>
          </div>
        </div>
      </div>
    </div>
</body>