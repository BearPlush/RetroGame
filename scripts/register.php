<?php
    session_start();
    try {
        $bdd = new PDO('mysql:host=localhost:3307;dbname=retrogame_db;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
    } catch(Exception $e) {
        echo 'Erreur : ' .$e->getMessage() ;
    }
    

    function CheckMail ( $mail ) { 
        return preg_match( '#^[-.\w]{1,}@[-.\w]{2,}\.[a-zA-Z]{2,4}$#', $mail);  
    }
    
    function CheckPwd ( $pwd , $pwdChk ) { 
        if ($pwd == $pwdChk ) return preg_match( '#[a-zA-Z0-9]{8,50}#', $pwd );
        return false;
    }   

    function regInDb ( $mail , $pwd , $bdd ) {
        function nameRandomizer($length = 18) {
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($char);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $char[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $pseudo = nameRandomizer();
        $hash = hash('sha256', $pwd );
        
        $datas = array(':pseudo'=>$pseudo, ':mail'=>$mail, ':hashv'=>$hash);
        try{
            $requete = $bdd->prepare("INSERT INTO users (pseudo, mail, pwd) VALUES (:pseudo,:mail,:hashv)");
            $requete->execute($datas);
          }catch(Exception $e){
             echo " Erreur ! ".$e->getMessage();
             echo " Les datas : " ;
            print_r($datas);
          }
          $_SESSION['mail'] = $mail;
          $_SESSION['hash'] = $hash;
          header('Location: http://localhost:81/test_php/RetroGame/pages/account.php');
          die();
    ;}
    
    if (CheckMail($_POST['mail']) && CheckPwd($_POST['pwd'], $_POST['pwdchk'])) {

    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $datas = array(':mail'=>$mail);

    try{
        $checkDB = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
        $checkDB->execute(array($mail)) ;
        $datas = $checkDB->fetch();
        $row = $checkDB->rowCount();
      }catch(Exception $e){
         echo " Erreur ! ".$e->getMessage();
         echo " Les datas : " ;
        print_r($datas);
      }
    if (!$row > 0 ) regInDb( $mail , $pwd , $bdd );

    } else {echo "Erreur rentré";};
