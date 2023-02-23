<?php

require_once './common/navbar.php';
require_once './include/init.php';



$select= $db->query('SELECT * FROM produit');

$produits = $select->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Shop konexio</title>
</head>

<body>
    

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center fst-italic">Accueil</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-evenly">

        <?php foreach ($produits as $produit) {
?>            
            <div class="card shadow-lg m-3" style="width: 18rem;">
                <img src=<?php echo $produit['photo'] ?> class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit['titre'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $produit['categorie'] ?></h6>
                    <p class="card-text"><?php echo $produit['description'] ?></p>
                    <p class="fw-bold text-success"><?php echo $produit['prix'] ?> €</p>
                    <a href="#" class="btn btn-primary"><i class="bi bi-eye"> </i>Voir ce produit</a>
                </div>
            </div>

            <?php } ?>

            <div class="card shadow-lg m-3" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2018/04/11/16/07/tshirt-3310850__480.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tee Shirt</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Catégorie</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="fw-bold text-success">25 €</p>
                    <a href="#" class="btn btn-primary"><i class="bi bi-eye"> </i>Voir ce produit</a>
                </div>
            </div>

            
        </div>

<?php require_once './common/footer.php' ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>