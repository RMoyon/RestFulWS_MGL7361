RestFulWS_MGL7361
========

Un serveur REST sous symfony 3. La description du système est dans le wiki.

## Prérequis

### Windows

Installer WAMP Server installera tous les prérequis pour utiliser l'application.

Pour tester si WAMP est bien installé, allez à l'adresse `http://localhost/phpmyadmin/`.
Par défaut, le nom d'utilisateur est `root` et le mot de passe est vide.

Il est recommandé d'utiliser la même version de PHP que WAMP. Pour voir la version de PHP installée sur windows, faire `php -v` dans l'invite de commande. Pour voir la version de PHP de WAMP, dans votre navigateur allez à l'adresse `http://localhost` ou `http://127.0.0.1`.

Pour changer votre installation de PHP sur windows, il faut aller dans `Windows+Pause -> Modifier les paramètres -> Paramètres système avancés -> Variables d'environnement`, modifier la variable `Path`, nouveau et copier coller le chemin du PHP de WAMP (par défaut `C:\wamp64\bin\php\phpX.X.XX`).

### Linux

1. Installer PHP

2. Installer un serveur Apache

3. Installer MySQL & phpMyAdmin

4. Ne pas oublier de tester phpMyAdmin
```
http://localhost/phpmyadmin/
```

### MacOS

L'installation des prérequis sur MacOS est pratiquement pareil que pour Windows, à la différence qu'il faut installer MAMP au lieu de WAMP.

## Configurer le serveur REST

1. Initialiser le projet

Dans l'invite de commande, dans la base du dossier RestFulWS_MGL7361
```
composer install
```

2. Créer la base de données

Dans l'invite de commande, dans la base du dossier RestFulWS_MGL7361
```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --dump-sql --force
php bin/console doctrine:database:import ScriptSQLInsert.sql
```

Si vous n'arrivez pas à installer la base de données, vérifier que vos paramètres sont bien configurer dans le fichier `app/config/parameters.yml`

  - Pour réinitialiser la base de données faire `php bin/console doctrine:database:drop --force`. Ensuite, refaire la procédure ci dessus.

3. Lancer le serveur
```
php bin/console server:run
```

4. Tester
```
127.0.0.1:8000/users
```

Pour le test, l'installation d'un logiciel comme Postman est recommandé pour une plus grande lisibilité et facilité d'utilisation.
