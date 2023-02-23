<?php 
require_once './include/init.php';
require_once './common/navbar.php';

if(isset($_SESSION['auth'])){
    $firstname = $_SESSION['auth']['firstname'];
    $lastname = $_SESSION['auth']['lastname'];
    $id_user = $_SESSION['auth']['id_user'];
}else{
    // echo 'ok';
    header('Location: connexion.php');
    exit;
}

if($_POST){
    var_dump($_POST);
    if($_POST['disconnect']){
        session_destroy();
        header('Location: index.php');
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
    <title>Profil</title>
</head>
<body>
    <?php echo '<h1>Bonjour '.$firstname.'</h1>'; ?>

    <br>

    <form action="" method='post'>
        <input type="submit" name='disconnect' class='btn btn-danger' value='Déconnexion'>
    </form>

<?php require_once 'common/footer.php'; ?>
</body>
</html>