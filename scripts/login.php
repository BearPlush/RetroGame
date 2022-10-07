<?php
    session_start();
    try {
        $bdd = new PDO('mysql:host=localhost:3307;dbname=retrogame_db;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
    } catch(Exception $e) {
        echo 'Erreur : ' .$e->getMessage() ;
    }
    

    function CheckMail ( $mail , $bdd ) { 
        try{
            $checkDB = $bdd->prepare('SELECT mail FROM users WHERE mail = ?');
            $checkDB->execute(array($mail)) ;
            $datas = $checkDB->fetch();
            $row = $checkDB->rowCount();
          }catch(Exception $e){
             echo " Erreur ! ".$e->getMessage();
             echo " Les datas : " ;
            print_r($datas, "</ br>");
          }
        if ($row > 0 ) return true;  
    }
    
    function CheckPwd ( $mail , $pwd , $bdd) { 
        try{
            $checkDB = $bdd->prepare('SELECT pwd FROM users WHERE mail = ?');
            $checkDB->execute(array($mail)) ;
            $datas = $checkDB->fetch();
            $hashPwd = hash('sha256', $pwd );
          }catch(Exception $e){
             echo " Erreur ! ".$e->getMessage();
             echo " Les datas : " ;
            print_r($datas);
          };
          if ($datas[0] == $hashPwd) return true;
    }

    if (CheckMail($_POST['mail'], $bdd) && CheckPwd($_POST['mail'],$_POST['pwd'], $bdd)) {
        
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['hash'] = $_POST['pwd'];
        header('Location: http://localhost:81/test_php/RetroGame/pages/account.php');
        die(); 
    }
    ?>      
