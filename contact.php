<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

require_once 'common/navbar.php';

if($_POST){
  var_dump($_POST['email']);
    if(isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['message'])){

        $mail = new PHPMailer();
        
        try {
            //Server settings
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;                    
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'clem8260@gmail.com';                     
            $mail->Password   = 'awqztqwropwubugx';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;
        
            //Recipients
            $mail->setFrom($_POST['email'], $_POST['email']);
            $mail->addAddress('clem8260@gmail.com', 'Admin');
            $mail->addReplyTo($_POST['email'], 'Information');
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $_POST['objet'];
            $mail->Body    = $_POST['message'];
            $mail->AltBody = $_POST['message'];
        
            $mail->send();
            echo '<div class="alert alert-success">Message envoyé avec succès</div>';
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Erreur lors de l'envoie de votre message</div> ";
        }
    }else {
        echo 'Veuillez remplir tout les champs !';
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contact</title>
</head>
<body>
<form action='' method='POST'>
  <div class="form-group">
    <label for="email">Email address</label>
    <input name='email' type="email" class="form-control" id="email" placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label for="objet">Objet</label>
    <input name='objet' type="text" class="form-control" id="objet" placeholder="name@example.com">
  </div>


  <div class="form-group">
    <label for="message">
        Message
    </label>
    <textarea name='message' class="form-control" id="message" rows="3"></textarea>
  </div>

  <input class='btn btn-success' type="submit">
</form>
</body>
</html>

<?php 
require_once 'common/footer.php';
?>