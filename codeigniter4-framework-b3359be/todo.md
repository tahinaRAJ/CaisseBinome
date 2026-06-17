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
- [ ] création du template de base
- [ ] layout principal avec zone d'affichage de la caisse active au-dessus du menu

# Flow
## Authentification
- [ ] création de `AuthController`
- [ ] page de login (vue)
- [ ] fonction login
- [ ] fonction logout
- [ ] protection des routes (filtre session)

## Choix de Caisse
- [ ] création de l'écran d'accueil (choix du numéro de caisse)
- [ ] dropdown listant les caisses depuis la base
- [ ] bouton Valider
- [ ] sauvegarde de la caisse choisie en session
- [ ] affichage de la caisse active au-dessus du menu après validation

## Saisie des Achats
- [x] création de `AchatController`
- [ ] Etape 1 : formulaire de saisie (dropdown Produit + champ Quantité + bouton Valider)
- [ ] route GET vers la page de saisie
- [ ] route POST pour enregistrer un article
- [ ] Etape 2 : tableau récapitulatif (Produit, Prix Unit, Qté, Montant)
- [ ] calcul et affichage du Total
- [ ] mise à jour de la quantité en stock après chaque ajout

## Clôture d'Achat
- [ ] bouton « Clôturer achat »
- [ ] finalisation de l'achat en base (un achat = un client)
- [ ] remise à zéro de la liste pour le prochain client

# Modèles
- [ ] `ProduitModel`
- [ ] `CaisseModel`
- [ ] `AchatModel`
