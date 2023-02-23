# BOUTIQUE

## 1 Création de la base de données

1. Créer la base de données nommée `boutique_konexio` avec les tables suivantes :

- produit:
  - id_produit(int, auto_increment primary key)
  - reference(varchar(100) unique)
  - categorie(varchar(100))
  - titre(varchar(100))
  - description(text)
  - couleur(varchar(20))
  - taille(varchar(10))
  - public(enum('m', 'f', 'mixte', 'enfant'))
  - photo(varchar(255))
  - prix(int)
  - stock(int)
- membre:
  - id_membre(int, auto_increment primary key)
  - pseudo(varchar(50) unique)
  - mdp(varchar(100))
  - nom(varchar(100))
  - prenom(varchar(100))
  - email(varchar(100) unique)
  - civilite(enum('m', 'f'))
  - statut(int) // 0 = membre, 1 = admin
  - adresse(varchar(255))
  - code_postal(int 5 unsigned zerofill)
  - ville(varchar(100))
  - pays(varchar(100))
- commande:
  - id_commande(int, auto_increment primary key)
  - id_membre(int)
  - montant(int)
  - date_enregistrement(datetime) CURRENT_TIMESTAMP
  - etat(enum('en cours', 'validé', 'expédié', 'livré'))
- details_commande:
  - id_details_commande(int, auto_increment primary key)
  - id_commande(int)
  - id_produit(int)
  - quantite(int)
  - prix(int)

## 2 Création du menu

1. Créer un fichier `index.php` le menu du site avec les liens suivants :

- Accueil
- Boutique
- Contact
- Inscription
- Connexion
- Profil
- Déconnexion
- Panier
- Administration

## 3 Création de la page d'accueil

1. Faire la page d'accueil du site avec un slider qui affiche les produits ajoutés à la boutique.

## 4 Mettre en place la structure de la boutique

## 5 Création de la page d'inscription

1. Faire la page d'inscription avec un formulaire qui permet d'insérer les données dans la table `membre` de la base de données `boutique_konexio`. Vous devez vérifier que les données saisies sont correctes et informer l'utilisateur en cas d'erreur avec un message d'erreur clair et précis.Faire la vérification de tous les champs du formulaire.Et si tout est ok hashé le mot de passe avec la fonction `password_hash()` et insérer les données dans la base de données.
