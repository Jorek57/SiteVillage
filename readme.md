# Site de Diane Capelle:

## Présentation du projet

Ce site présente la vie et les actualités du village.
Il utilise notamment Bootstrap et Laravel.

## Installation depuis git:

- Créer une base de données pour le projet
- Pull le projet
- Renommer le fichier .env.example en .env et remplir les infos pour la base de données
- Lancer les commandes suivantes:
```
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

### Notes:

J'utilise Laragon plutot que Wamp car il y a parfois des problèmes d'incompatibilité avec Laravel sous Wamp.
Si malgré tout il y a des problèmes pour lancer le projet, contactes moi!.

Les identifiants générés par le seed suivent la structure 'emailX@blop.fr' et 'passwordX' où X est un nombre de 1 à 5.
