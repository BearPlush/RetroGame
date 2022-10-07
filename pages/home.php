<?php
try {
  $bdd = new PDO('mysql:host=localhost:3307;dbname=retrogame_db;charset=utf8', 'root', 'root');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bdd->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
} catch (Exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}


try {
  $checkDB = $bdd->prepare('SELECT * FROM products ORDER BY CD DESC LIMIT 4');
  $checkDB->execute();
  $datas = $checkDB->fetch();
} catch (Exception $e) {
  echo " Erreur ! " . $e->getMessage();
  echo " Les datas : ";
  print_r($datas);
};






?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RetroGame | home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="../sources/style/home.css">
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="refresh" content="30">
</head>
<!--
==============================================
                    HEADER
==============================================
-->

<body>
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="refresh" content="30">
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
                    TITLE
==============================================
-->
  <div class='console-container'><span id='text'></span>
    <div class='console-underscore' id='console'>&#95;
      <div class="mb-3">
      </div>
    </div>
  </div>
  <noscript>
    <h1 class="noScriptTitle">RetroGame</h1>
  </noscript>
  <script src="../scripts/title.js"></script>
  <div class="box-search">
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Rechercher une console ?">
  </div>
  <!--
==============================================
                  RECENT SHOP
==============================================
-->

<?php

echo
  "<div class='box-shop'>
    <div class='bo-box'>
      <div class='card'>
        <img class='img-top' src='../sources/img/game.png' width='220px' height='220px' alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'>' $datas[1] '</h5>
          <p class='card-text'>' $datas[2] , $datas[4]  ' </p>
          <input type='submit' value='$datas[3] €'>
        </div>
        </div>
        <div class='card'>
        <img class='img-top' src='../sources/img/game.png' width='220px' height='220px' alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'>' $datas[1] '</h5>
          <p class='card-text'>' $datas[2] , $datas[4] , $datas[5]  ' </p>
          <input type='submit' value='$datas[3] €'>
        </div>
        </div>
        <div class='card' >
        <img class='img-top' src='../sources/img/game.png' width='220px' height='220px' alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'>' $datas[1] '</h5>
          <p class='card-text'>' $datas[2] , $datas[4] , $datas[5]  ' </p>
          <input type='submit' value='$datas[3] €'>
        </div>
        </div>
        <div class='card'>
        <img class='img-top' src='../sources/img/game.png' width='220px' height='220px' alt='Card image cap'>
        <div class='card-body'>
          <h5 class='card-title'>' $datas[1] '</h5>
          <p class='card-text'>' $datas[2] , $datas[4] , $datas[5]  ' </p>
          <input type='submit' value='$datas[3] €'>
        </div>
        </div>
      </div>
      </div>
    </div>" ?>
  </div>
</body>

</html>