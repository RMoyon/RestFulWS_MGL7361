RestFulWS_MGL7361
========

### Configuration

1. Installation de PHP
  * Sous windows
Installer WAMP installera PHP si vous ne l'avez pas déjà installé.
Il est recommander d'utiliser la même version de PHP que WAMP. Pour voir la version de PHP installée sur windows faire `php -v` dans l'invite de commande. Pour voir la version de PHP de WAMP, dans votre navigateur aller à l'adresse `localhost` ou `127.0.0.1`. Pour changer votre installation de PHP sur windows, il faut aller dans `Windows+Pause -> Modifier les paramètres -> Paramètres système avancés -> Variables d'environnement`, modifier la variable `Path`, nouveau et copier coller le chemin du PHP de WAMP (par défaut `C:\wamp64\bin\php\phpX.X.XX`).

  * Linux

Voir la documentation du système d'exploitation.

2. Installation d'un serveur Apache
```
Si sur Windows, l'installation de WAMP server est suffisant.
Si sur Linux, voir la documentation du système d'exploitation.
Si sur MacOs, bonne chance.
```

3. Installation de MySQL & phpMyAdmin
```
Si sur Windows, WAMP contient de base MySQL et phpMyAdmin.
Si sur Linux, voir la documentation du système d'exploitation.
Si sur MacOs, vraiment, bonne chance.
```

4. Ne pas oublier de tester phpMyAdmin
```
http://localhost/phpmyadmin/
```

5. Configurer le serveur
Dans l'invite de commande, dans la base du dossier RestFulWS_MGL7361
```
composer install
```

6. Créer la base de données
Dans l'invite de commande, dans la base du dossier RestFulWS_MGL7361
```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --dump-sql --force
php bin/console doctrine:database:import ScriptSQLInsert.sql
```

7. Lancer le serveur
```
php bin/console server:run
```

8. Tester
```
127.0.0.1:8000/users
```
