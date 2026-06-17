# CaisseBinome - CodeIgniter 4

Application de caisse de supermarché réalisée avec **CodeIgniter 4** et **SQLite**.

### 1. Lancer l’application

Depuis le dossier du projet :

```bash
composer install
php spark migrate
```

cette commande n'est pas necessaire si caisse.sqlite existe deja

```bash
php spark db:seed DatabaseSeeder
```

```bash
php spark serve
```

Ensuite, ouvrir :
http://localhost:8080/login

### 2. Comptes de démonstration

Utiliser un de ces comptes :

- `admin@example.com` / `admin`
- `test@example.com` / `user`

## Base de données

Le projet utilise une base SQLite stockée dans :

```text
writable/database/caisse.sqlite
```

Si vous voulez repartir de zéro, vous pouvez supprimer ce fichier puis relancer :

```bash
php spark migrate
php spark db:seed DatabaseSeeder
```
