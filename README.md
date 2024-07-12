# Symfony.7.1.2

## Installation de Symfony

### Date 12-07-2024

#### Installation de Symfony

- Version Symfony 7.1.2
- Version PHP 8.3
- Version Composer 2.7.7

A faire :

Télécharger et installer Symfony (`symfony-cli_windows_amd64.zip`) à partir du lien suivant :

https://symfony.com/download

Puis installation du `symfony.exe` dans les variables d'environnement  `Windows`

Installation de Composer à partir du lien suivant :

https://getcomposer.org/download/

Choisir `PHP 8.3` pour composer, mais également comme version PHP dans les variables d'environnement `Windows`


Création d'un nouveau projet Symfony (le dernier paramètre est le nom du projet) :

```bash
symfony new --webapp SymfonyLast0724
```

### Lancez le serveur Symfony

Depuis le dossier du projet, lancez le serveur Symfony :

```bash
symfony server:start
```

### Accédez à votre projet

Depuis votre navigateur, accédez à votre projet Symfony :

```bash
https://127.0.0.1:8000/
```

![Symfony](https://raw.githubusercontent.com/mikhawa/Symfony.7.1.2/main/MyDatas/2024.07.12-11_36_58.png)

Cette page est la page d'accueil de Symfony lorsqu'un nouveau projet est créé.

Nous voyons à la toolbar en bas de la page, que nous sommes en mode `dev`, et qu'il n'y a pas de route définie pour la page d'accueil (`404`).

### php bin/console

Pour voir les commandes disponibles, tapez :

```bash
php bin/console
```

On peut voir toutes les commandes disponibles pour Symfony déjà installées (`symfony new --webapp`).

Nous constatons que `Twig` est déjà installé.

### Dossiers MVC

De base en Symfony, nous avons les dossiers suivants :

Modèles : `src/Entity`

Vues : `templates`

Contrôleurs : `src/Controller`

### php bin/console make:controller

Les routes sont définies vers les contrôleurs depuis le fichier `config/routes.yaml`.

```yaml
controllers:
    resource:
        path: ../src/Controller/
        namespace: App\Controller
    type: attribute
```

Pour créer un contrôleur, tapez :

```bash
php bin/console make:controller
```

![php bin/console make:controller](https://raw.githubusercontent.com/mikhawa/Symfony.7.1.2/main/MyDatas/2024-07-12.121311.png)

Pour voir ce contrôleur, tapez :

```bash
php bin/console debug:router
```

Le chemin web est donc https://127.0.0.1:8000/my/first

Le chemin du contrôleur est `src/Controller/MyFirstController.php` et celui de la vue est `templates/my_first/index.html.twig`

On peut changer l'URL et son nom dans le contrôleur `MyFirstController.php` :

```php
#[Route('/my/first', name: 'app_my_first')]

// par exemple, on change l'URL puis le nom de la route

#[Route('/', name: 'homepage')]
```

Notre contrôleur est maintenant accessible sur la page d'accueil, à l'URL https://127.0.0.1:8000/



