# SETUP
- [x] création du projet CodeIgniter
- [x] installation de la base SQLite
- [x] configuration de l'environnement

# Base de données
- [x] création de la base SQLite
- [x] création de la table `produit` (désignation, prix, quantité en stock, etc.)
- [x] création de la table `caisse`
- [x] création de la table `achat`
- [x] insertion de 5 produits de test
- [x] insertion de 2 caisses de test

# Template
- [x] création du template de base
- [x] layout principal avec zone d'affichage de la caisse active au-dessus du menu

# Flow
## Authentification
- [x] création de `AuthController`
- [x] page de login (vue)
- [x] fonction login
- [x] fonction logout
- [x] protection des routes (filtre session)

## Choix de Caisse
- [x] création de l'écran d'accueil (choix du numéro de caisse)
- [x] dropdown listant les caisses depuis la base
- [x] bouton Valider
- [x] sauvegarde de la caisse choisie en session
- [x] affichage de la caisse active au-dessus du menu après validation

## Saisie des Achats
- [x] création de `AchatController`
- [x] Etape 1 : formulaire de saisie (dropdown Produit + champ Quantité + bouton Valider)
- [x] route GET vers la page de saisie
- [x] route POST pour enregistrer un article
- [x] Etape 2 : tableau récapitulatif (Produit, Prix Unit, Qté, Montant)
- [x] calcul et affichage du Total
- [x] mise à jour de la quantité en stock après chaque ajout

## Clôture d'Achat
- [x] bouton « Clôturer achat »
- [x] finalisation de l'achat en base (un achat = un client)
- [x] remise à zéro de la liste pour le prochain client

# Modèles
- [x] `ProduitModel`
- [x] `CaisseModel`
- [x] `AchatModel`
