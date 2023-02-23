<?php 
require_once 'navbar.php';
require_once '../include/init.php';


$req = $db->query("SELECT * FROM produit");

$produits = $req->fetchAll(PDO::FETCH_ASSOC);

$total_column = $req->columnCount();

for ($counter = 0; $counter < $total_column; $counter ++) {
    $meta = $req->getColumnMeta($counter);
    $column[] = $meta['name'];
}


if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
        $delete = $db->prepare('DELETE FROM `produit`WHERE `id_produit` = :id');
        $delete -> bindParam(':id',$_GET['id']);
        $delete->execute();
    }
    if($_GET['action']=='update'){
        echo 'update';
        $update = $db->prepare('SELECT * FROM `produit` WHERE id_produit = :id');
        $update -> bindParam(':id',$_GET['id']);
        $update -> execute();

        $update_data = $update->fetch(PDO::FETCH_ASSOC);

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
    <script type="text/javascript" src="../public/assets/js/script.js"></script>

    <title>Gestion produit</title>
</head>
<style>
    <?php 
        require_once '../public/assets/css/style.css';
    ?>
</style>
<body>

<table class="greyGridTable">
<thead>
<tr>
    <?php foreach($column as $value){
        echo '<th>'.$value.'</th>';
    } ?>
    <th>action</th>
</tr>
</thead>
<tbody>
<?php 
foreach($produits as $key => $produit){

    echo '<tr>';
    echo '<form method="post">';
    foreach($produit as $key => $value){

    if($key=='photo'){
        echo '<td><img width="100px" height="100px" src='.$value.' alt=""></td>';
    }else{
        echo '<td>'.$value.'</td>';
    }
    
}
echo'<td><a href="gestionProduits.php?action=update&id='.$produit['id_produit'].'"class="btn btn-warning">Modifier</a>
         <a href="gestionProduits.php?action=delete&id='.$produit['id_produit'].'" class="btn btn-danger">Supprimer</a>
    </td>';
    echo'</form>';
    echo '</tr>';
}
?>
</tbody>
</table>

<form action="" method='post' enctype="multipart/form-data">

    <div class="form-group">
            <label for="reference">Réference</label>
            <input type="text" value='<?php echo $update_data['reference'] ?>' class="form-control" name='reference' id="reference" placeholder="reference">
        </div>

        <div class="form-group">
            <label for="categorie">Catégorie</label>
            <input type="text" value='<?php echo $update_data['categorie'] ?>'  class="form-control" name='categorie' id="categorie">
        </div>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" value='<?php echo $update_data['titre'] ?>'  class="form-control" name='titre' id="titre">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" value='<?php echo $update_data['description'] ?>'  class="form-control" name='description' id="description">
        </div>

        <div class="form-group">
            <label for="color">Couleur</label>
            <input type="color" value='<?php echo $update_data['couleur'] ?>'  class="form-control" name='color' id="color">
        </div>

        <div class="form-group">
            <label for="taille">Taille</label>
            <input type="text" value='<?php echo $update_data['taille'] ?>'  class="form-control" name='taille' id="taille">
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
            <input type="file" value='<?php echo $update_data['photo'] ?>'  class="form-control" name='photo' id="photo">
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" value='<?php echo $update_data['prix'] ?>'  class="form-control" name='prix' id="prix">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" value='<?php echo $update_data['stock'] ?>'  class="form-control" name='stock' id="stock">
        </div>

        <input type="submit" value="Envoyez" class='btn btn-success'>
    </form>

<?php
require_once '../common/footer.php';
?>
</body>
</html>