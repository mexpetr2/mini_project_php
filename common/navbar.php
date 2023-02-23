<?php 
require_once(realpath(dirname(__FILE__) . '/../include/init.php'));

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ShOp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Boutique</a>
                    </li>
                    <?php if(!isset($_SESSION['auth'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                    <?php } ?>

                    <?php if(isset($_SESSION['auth'])){ ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Profil</a>
                    </li>

                    <?php } ?>

                    <?php 
                    if(userConnectAndAdmin()){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../11-PROJET/admin/index.php">Administration</a>
                    </li>
                    <?php }?>

                    <?php if(isset($_SESSION['auth'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php?action=logout">Déconnexion</a>
                    </li>
                    <?php } ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Panier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>