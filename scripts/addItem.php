<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost:3307;dbname=retrogame_db;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

function CheckNamed($named)
{
    return preg_match('#[\w]{1,18}#', $named);
}

function CheckEditor($editor)
{
    return preg_match('#[\w]{1,16}#', $editor);
}

function CheckConsole($console)
{
    return preg_match('#[\w]{1,16}#', $console);
}

function CheckPrice($price)
{
    return preg_match('#[0-9]{1,4}#', $price);
}
function CheckStatut($statut)
{
    return preg_match('#[\w]{1,18}#', $statut);
}

function CheckCategory($category)
{
    return preg_match('#[\w]{1,18}#', $category);
}




function regInDb( $bdd)
{

    $named = $_POST['named'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $statut = $_POST['statut'];
    $console = $_POST['machine'];
    $editor = $_POST['editor'];
    $seller_mail = $_SESSION['mail'];

    $datas = array(':named' => $named, ':category' => $category, ':price' => $price, ':statut' => $statut, ':editor' => $editor, ':console' => $console, ':seller_mail' => $seller_mail);
    try {
        $requete = $bdd->prepare("INSERT INTO products (named, category, price, statut, editor, console, seller_mail) VALUES (:named,:category,:price,:statut,:editor,:console,:seller_mail)");
        $requete->execute($datas);
    } catch (Exception $e) {
        echo " Erreur ! " . $e->getMessage();
        echo " Les datas : ";
        print_r($datas);
    }
    header('Location: http://localhost:81/test_php/RetroGame/pages/account.php');
    die();
}

if (CheckStatut($_POST['statut']) && CheckCategory($_POST['category']) && CheckNamed($_POST['named']) && CheckEditor($_POST['editor'] && CheckConsole($_POST['machine']) && CheckPrice($_POST['price']))) {
    regInDb($bdd);
} else {
    echo "Erreur rentré";
};
