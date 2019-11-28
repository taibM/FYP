<?php
    require_once 'functions.php';

    session_start();

    if(!empty($_POST)){
        require_once 'db.php';
        $errors=array();

        if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['username'])){
            $errors['username']="votre nom d'utilisateur n'est pas valide ";
        }else {
            $req = $pdo->prepare('SELECT id_client FROM client WHERE username=?');
            $req->execute([$_POST['username']]);
            $user = $req->fetch();
            
            if($user){
                $errors['username']="Ce nom d'utilisateur est deja pris ";
            }
        }

        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email']="votre email n'est pas valide ";
        }else {
            $req = $pdo->prepare('SELECT id_client FROM client WHERE email=?');
            $req->execute([$_POST['email']]);
            $email = $req->fetch();
            
            if($email){
                $errors['email']="Cette email est deja pris ";
            }
        }


        if(empty($_POST['password']) || $_POST['password'] != $_POST['comfirm_password']){
            $errors['password']="vous devenez entrer un mot de passe valide ";
        }
        if(empty($_POST['adresse'])){
            $errors['adresse']="votre adresse n'est pas valide ";
        }
        if(empty($_POST['codepostal'])){
            $errors['codepostal']="le code postal n'est pas valide ";
        }
        if(empty($_POST['telephone'])){
            $errors['telephone']="votre numero de telephone n'est pas valide ";
        }
        if(empty($errors)){
           
            $req = $pdo->prepare("INSERT INTO client SET username=? ,password=? ,email=? ,adresse=? ,codepostal=? ,telephone=? ,confirmation_token=? ,type=?");
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $token = str_random(60);

            $req->execute([$_POST['username'],$password,$_POST['email'],$_POST['adresse'],$_POST["codepostal"],$_POST['telephone'],$token,"user"]);
            // envoi  du mail de confirmation de compte 
                
                $destinataire = $_POST['email'];
                $sujet = "Comfirmation du compte";
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"FYP.com"<findyourpicture.fyp@gmail.com>'."\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                $user_id = $pdo->lastInsertId();
                $message = '

                Pour valider votre compte, veuillez cliquer sur le lien ci dessous
                ou copier/coller dans votre navigateur internet.
                  
                http://localhost/fyp/inc/confirm.php?id='.urlencode($user_id).'&token='.$token.'
                  
                  
                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre. 

                ';


                ini_set("SMTP","ssl://smtp.gmail.com");
                ini_set("smtp_port","587");
            mail($destinataire,$sujet,$message,$header); // envoi du mail 
            $_SESSION['flash']['success']="un email de comfirmation vous a été envoyé pour valider votre compte ";
            
            header('Location: login.php');
            exit(); 
        }
        
       
    }

?>
<?php 
    require 'header.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="../css/signup.css">
    <title>FYP</title>
</head>
<body>
<div class="container">
                <?php if(!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <p>vous n'avez pas rempli le formulaire correctement :</p>
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>    
                    </div>
                <?php endif; ?>
                
                <div class="signup-form">
                    <form action="" method="post">
                        <h2>Inscription</h2>
                        <p class="hint-text">Créez votre compte. C'est gratuit et ne prend que quelque minute.</p>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email ..." class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            
                            <input type="text" name="username" placeholder="Nom d'utilisateur ..." class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder=" Nouveau mot de passe  ..." class="form-control" required="required" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="comfirm_password" placeholder=" Confirmer mot de passe  ..." class="form-control" required="required" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="adresse" placeholder="Adresse domicile ..." class="form-control" required="required">
                        </div>     
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6"><input type="text" name="codepostal" placeholder="Code postal ..." class="form-control" required="required" ></div>
                                <div class="col-xs-6"><input type="tel" name="telephone" placeholder="Numero telephone ..." class="form-control" required="required"  ></div>
                            </div>        	
                        </div>   
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">S'inscrire</button>
                        </div>
                    </form>
                    <div class="text-center">Vous avez déja un compte ? <a href="login.php">se connecter</a></div>
                </div>

                 
</body>
</html>