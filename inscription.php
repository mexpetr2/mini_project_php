<?php 
require_once 'include/init.php';
require_once 'common/navbar.php';

$error = '';
if($_POST){
if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['nom']) || empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['civilite']) || empty($_POST['adresse']) || empty($_POST['code_postal']) || empty($_POST['ville']) || empty($_POST['pays'])){
    $error.= 'Veuillez remplir tous les champs !<br>';
    // echo 'Veuillez remplir tous les champs !<br>';
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error.= 'Veuillez rentrer une adresse email valide ! <br>';
}
if ($_POST['password']!==$_POST['confirm_password']){
    $error.= 'Les mots de passe ne correspondent pas ! <br>';
}

if(empty($error)){
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT); 
    $req = $db->prepare("INSERT INTO `membre`(`pseudo`, `password`, `nom`, `prenom`, `email`, `civilite`, `adresse`, `code_postal`, `ville`, `pays`) VALUES (:pseudo,:password,:nom,:prenom,:email,:civilite,:adresse,:code_postal,:ville,:pays)");
    $req->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $req->bindParam(':password', $password, PDO::PARAM_STR);
    $req->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $req->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $req->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $req->bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR);
    $req->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $req->bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_INT);
    $req->bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
    $req->bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);

    if($req->execute()){
        echo "<div class='alert alert-success'>Inscription réussi !</div>";
    }else{
        echo "<div class='alert alert-danger'>Erreur lors de l'inscription !</div>";
    }
}else{
    echo $error;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        <?php 
        require_once './public/assets/css/style.css';
        ?>
    </style>
</head>
<body>
   

    <div class='container center'>
    <form action="" method='post'>

        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name='pseudo' id="pseudo" placeholder="Entrez votre pseudo">
        </div>

        <div class="form-group">
            <label for="password">Mot de pase</label>
            <input type="password" class="form-control" name='password' id="password" placeholder="Entrez votre mot de passe">
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmer votre mot de pase</label>
            <input type="password" class="form-control" name='confirm_password' id="confirm_password" placeholder="Entrez votre mot de passe (encore)">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name='prenom' id="prenom" placeholder="Entrez votre prénom">
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name='nom' id="nom" placeholder="Entrez votre nom">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name='email' id="email" placeholder="Entrez votre email">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="civilite" id="civlite1" value="m" checked>
            <label class="form-check-label" for="civilite1">Monsieur</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="civilite" id="civilite2" value="f">
            <label class="form-check-label" for="civilite2">Madame</label>
        </div>


        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" name='adresse' id="adresse" placeholder="Entrez votre adresse">
        </div>

        <div class="form-group">
            <label for="code_postal">Code postal</label>
            <input type="number" class="form-control" max='99999' name='code_postal' id="code_postal" placeholder="Entrez votre code postal">
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" name='ville' id="ville" placeholder="Entrez votre Ville">
        </div>

        <div class="form-group">
            <label for="pays">Pays</label>
            <input type="text" class="form-control" name='pays' id="pays" placeholder="Entrez votre Pays">
        </div>



    <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    </div>

    <?php require_once 'common/footer.php'; ?>
</body>
</html>