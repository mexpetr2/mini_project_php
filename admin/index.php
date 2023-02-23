<?php 
require_once '../include/init.php';

if(userConnectAndAdmin()===false){
    header('Location: index.php');
}


if($_POST){
    var_dump($_FILES);
    if(isset($_FILES['photo'])){  //isset($_POST['reference']) && isset($_POST['categorie'])&& isset($_POST['titre'])&& isset($_POST['decription'])&& isset($_POST['color'])&& isset($_POST['taille'])&& isset($_POST['public'])&& isset($_POST['prix'])&& isset($_POST['stock'])&& 
        if($_FILES['photo']['size'] <= 3000000){
            if(in_array(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION),['jpg', 'jpeg', 'png'])){
                $photoproduit = 'photo_produit' . time() . '_' . uniqid() . '_' . $_FILES['photo']['name'];

                define("CHEMIN", $_SERVER['DOCUMENT_ROOT'] . "/konexio/PHP/11-PROJET/");
                $img_dossier = CHEMIN . 'public/assets/images/' . $photoproduit;
                copy($_FILES['photo']['tmp_name'], $img_dossier);
                

                define("URL", "http://localhost/konexio/PHP/11-PROJET/");
                $img_bdd = URL . 'public/assets/images/' . $photoproduit;

                var_dump($_POST['description']);

                $insert = $db->prepare("INSERT INTO `produit`(`reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES (:reference,:categorie,:titre,:description,:couleur,:taille,:public,:photo,:prix,:stock)");
                $insert->bindParam(':reference', $_POST['reference'], PDO::PARAM_STR);
                $insert->bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
                $insert->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
                $insert->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
                $insert->bindParam(':couleur', $_POST['color'], PDO::PARAM_STR);
                $insert->bindParam(':taille', $_POST['taille'], PDO::PARAM_STR);
                $insert->bindParam(':public', $_POST['public'], PDO::PARAM_STR);
                $insert->bindParam(':photo', $img_bdd, PDO::PARAM_STR);
                $insert->bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
                $insert->bindParam(':stock', $_POST['stock'], PDO::PARAM_STR);

                $insert->execute();

                
            }else{
                echo 'Choisissez une image valide !';
            }
        }else{
            echo '  Choisissez une image de moins de 3Mo !';
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
    <title>Acceuil Admin</title>
    <style>
        <?php require_once '../public/assets/css/style.css'; ?>
    </style>
</head>
<body>
<?php 
require_once 'navbar.php';
?>

    <form action="" method='post' enctype="multipart/form-data">

    <div class="form-group">
            <label for="reference">Réference</label>
            <input type="text" class="form-control" name='reference' id="reference" placeholder="reference">
        </div>

        <div class="form-group">
            <label for="categorie">Catégorie</label>
            <input type="text" class="form-control" name='categorie' id="categorie">
        </div>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" name='titre' id="titre">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name='description' id="description">
        </div>

        <div class="form-group">
            <label for="color">Couleur</label>
            <input type="color" class="form-control" name='color' id="color">
        </div>

        <div class="form-group">
            <label for="taille">Taille</label>
            <input type="text" class="form-control" name='taille' id="taille">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="public" id="public1" value="m" checked>
            <label class="form-check-label" for="public1">Monsieur</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="public" id="public2" value="f">
            <label class="form-check-label" for="public2">Madame</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="public" id="public3" value="mixte">
            <label class="form-check-label" for="public3">Mixte</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="public" id="public4" value="enfant">
            <label class="form-check-label" for="public4">enfant</label>
        </div>


        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name='photo' id="photo">
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" name='prix' id="prix">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name='stock' id="stock">
        </div>

        <input type="submit" value="Envoyez" class='btn btn-success'>
    </form>

</body>
</html>