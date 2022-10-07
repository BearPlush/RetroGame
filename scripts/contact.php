<?php

session_start();
    try {
        $bdd = new PDO('mysql:host=localhost:3307;dbname=retrogame_db;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
    } catch(Exception $e) {
        echo 'Erreur : ' .$e->getMessage() ;
    }

    function CheckTitle ( $mail ) { 
        return preg_match( '#\w{1,150}#', $mail);  
    }

    function CheckTexte ( $text ) { 
        return preg_match( '#\w{1,256}#', $text);  
    }

    function CheckMail ( $mail ) { 
        return preg_match( '#^[-.\w]{1,}@[-.\w]{2,}\.[a-zA-Z]{2,4}$#', $mail);  
    }

    if (CheckTexte($_POST['text']) && CheckTitle($_POST['title'] && CheckMail($_SESSION['mail']))) { 
        $texte = $_POST['text'];
        $title = $_POST['title'];
        $mail = $_SESSION['mail'];
        $statut = 1;
        $datas = array(':mail'=>$mail, ':title'=>$title, ':texte'=>$texte, ':statut'=>$statut);
     }

    try{
        $requete = $bdd->prepare("INSERT INTO contact (mail, title, texte, statut) VALUES (:mail,:title,:texte,:statut)");
        $requete->execute($datas);
        header('Location: http://localhost:81/test_php/RetroGame/pages/account.php');
      }catch(Exception $e){
         echo " Erreur ! ".$e->getMessage();
         echo " Les datas : " ;
        print_r($datas);
      }

    

?>