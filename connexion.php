<?php 
require_once 'include/init.php';
require_once './common/navbar.php';

if($_GET){
    if($_GET['action']==='logout'){
        session_destroy();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        <?php require_once  './public/assets/css/style.css'; ?>
    </style>
</head>
<body>

    <div class='container center'>
    <form action='' method='POST'>
        <div class="form-group">
            <label for="email">Votre email</label>
            <input type="email" name='email' class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name='password' class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    <?php require_once './common/footer.php'; ?>
</body>
</html>

<?php 

if($_POST){
    $select=$db->prepare('SELECT * FROM membre WHERE email=:email');
    $select->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $select->execute();

    if($select->rowCount() > 0){
        $user = $select->fetch(PDO::FETCH_ASSOC);
        if(password_verify($_POST['password'],$user['password'])){
            $_SESSION['auth']['id_user'] = $user['id_membre'];
            $_SESSION['auth']['lastname'] = $user['prenom'];
            $_SESSION['auth']['firstname'] = $user['nom'];
            $_SESSION['auth']['role'] = $user['statut'];
        
            header('Location: profil.php');
        }
    }else{
        echo 'Email introuvable !';
    }

}

?>