# Symfony.7.1.2

Version installée : Symfony 7.1.2

En date du 12-07-2024

## Menu
- [Choix de Symfony](#choix-de-symfony)
- [Installation de Symfony](#installation-de-symfony)
- [Lancez le serveur Symfony](#lancez-le-serveur-symfony)
- [Accédez à votre projet](#accédez-à-votre-projet)
- [php bin/console](#php-binconsole)
- [Dossiers MVC](#dossiers-mvc)
- [php bin/console make:controller](#php-binconsole-makecontroller)
- [.env en local](#env-en-local)
- [Création de la base de données](#création-de-la-base-de-données)
- [Création d'une entité](#création-dune-entité)
- [Modification de l'entité avant la migration](#modification-de-lentité-avant-la-migration)
- [Création et exécution de la migration](#création-et-exécution-de-la-migration)




# Choix de Symfony

Symfony offre plusieurs avantages qui le distinguent des autres frameworks PHP, notamment :

1. **Flexibilité et Modularité** : Symfony est conçu autour de composants réutilisables et modulaires, ce qui permet aux développeurs de choisir et de personnaliser les éléments qu'ils souhaitent utiliser dans leurs projets.

2. **Communauté et Support** : Symfony bénéficie d'une large communauté de développeurs et d'un solide support professionnel. Cela signifie que les problèmes et les questions trouvent souvent des réponses rapidement.

3. **Performance** : Bien que la performance puisse varier en fonction de la manière dont il est utilisé, Symfony est optimisé pour être rapide et efficace, avec des outils intégrés pour le profilage et la débogage.

4. **Sécurité** : La sécurité est une priorité pour Symfony, qui offre de nombreuses fonctionnalités et configurations de sécurité intégrées pour protéger les applications contre les vulnérabilités courantes du web.

5. **Best Practices** : Symfony encourage l'utilisation des meilleures pratiques de développement et de conception, avec une structure de projet claire et des conventions qui aident à maintenir le code propre et bien organisé.

6. **Interopérabilité** : Conformément aux standards PHP comme PSR, Symfony assure une bonne interopérabilité avec d'autres bibliothèques et frameworks, facilitant l'intégration et la réutilisation du code.

7. **Documentation et Ressources d'Apprentissage** : Symfony dispose d'une documentation complète et bien organisée, ainsi que de nombreuses ressources d'apprentissage, ce qui facilite l'adoption du framework par les nouveaux développeurs.

8. **Longévité et Mises à Jour** : Symfony a une politique de longue durée de vie pour ses versions, avec un support clair et des mises à jour régulières, garantissant que les projets restent sécurisés et à jour.

Ces avantages font de Symfony un choix populaire pour le développement d'applications web complexes et de grande envergure. 

Il est utilisé par de nombreuses entreprises et organisations pour des projets de toutes tailles, de petites applications aux sites web à fort trafic.

Voici une vue vidéo permettant de comparer Symfony et Laravel :

https://grafikart.fr/tutoriels/laravel-symfony-866

Symfony vs Laravel est un débat digne d’intérêt entre ces deux frameworks riches en fonctionnalités.

Mais lequel choisir ? Tout dépend des problèmes que vous essayez de résoudre et de la technologie la plus adaptée.

Symfony convient mieux aux applications web complexes ou aux projets de développement à long terme qui nécessitent de nouvelles techniques de développement. 

Cependant, nous suggérons Laravel si vous souhaitez créer une application web simple avec peu de frais et dans un délai plus court.


---

Retour au [Menu](#menu)

---

### Installation de Symfony

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

---

Retour au [Menu](#menu)

---

### Lancez le serveur Symfony

Depuis le dossier du projet, lancez le serveur Symfony :

```bash
symfony server:start
```

Ou en mode démon (Daemon) pour lancer le serveur en arrière-plan :

```bash
symfony server:start -d
```

---

Retour au [Menu](#menu)

---

### Accédez à votre projet

Depuis votre navigateur, accédez à votre projet Symfony :

```bash
https://127.0.0.1:8000/
```

![Symfony](https://raw.githubusercontent.com/mikhawa/Symfony.7.1.2/main/MyDatas/2024.07.12-11_36_58.png)

Cette page est la page d'accueil de Symfony lorsqu'un nouveau projet est créé.

Nous voyons à la toolbar en bas de la page, que nous sommes en mode `dev`, et qu'il n'y a pas de route définie pour la page d'accueil (`404`).

---

Retour au [Menu](#menu)

---

### php bin/console

Pour voir les commandes disponibles, tapez :

```bash
php bin/console
```

On peut voir toutes les commandes disponibles pour Symfony déjà installées (`symfony new --webapp`).

Nous constatons que `Twig` est déjà installé.

---

Retour au [Menu](#menu)

---

### Dossiers MVC

De base en Symfony, nous avons les dossiers suivants :

Modèles : `src/Entity` (règle de nommage : `MyName.php` - PascalCase)

Vues : `templates` (règle de nommage : `entity_name/index.html.twig` - snake_case pour les dossiers et utilisation des `.` pour les noms de fichiers)

Contrôleurs : `src/Controller` (règle de nommage : `EntityNameController.php` - PascalCase)

Pour les variables d'environnement, elles sont dans le fichier `.env` à la racine du projet. **Attention ce fichier n'est pas ignoré par Git**. 

Il vaut mieux créer un fichier `.env.local` (à faire après le contrôleur) qui est ignoré par Git, pour les variables d'environnement locales. On peut y changer le nom de la base de données, le mot de passe, etc.

---

Retour au [Menu](#menu)

---

### php bin/console make:controller

Les routes sont définies vers les contrôleurs depuis le fichier `config/routes.yaml`.

```yaml
controllers:
    resource:
        path: ../src/Controller/
        namespace: App\Controller
    type: attribute
```

Pour créer un **contrôleur**, tapez :

```bash
php bin/console make:controller
```

Ce qui donne, si on veut créer un contrôleur `MyFirstController` :

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

---

Retour au [Menu](#menu)

---

### .env en local

Pour les variables d'environnement locales, on crée un fichier `.env.local` à la racine du projet.

On va y mettre notre connexion à la base de données locale en MySQL (`root` sans mot de passe dans cet exemple) :

```bash
DATABASE_URL="mysql://root:@localhost:3306/symfony_last_0724?serverVersion=8.2.0"
```

---

Retour au [Menu](#menu)

---

### Création de la base de données

Pour créer la base de données, après avoir créé la connexion dans `.env.local` on tape :

```bash
php bin/console doctrine:database:create
```
![Création de la base de données](https://raw.githubusercontent.com/mikhawa/Symfony.7.1.2/main/MyDatas/2024-07-12.131822.png)

---

Retour au [Menu](#menu)

---

### Création d'une entité

Pour créer une entité, on tape :

```bash
php bin/console make:entity
```

Note : Pour utiliser `Symfony UX Turbo` qui est proposé, on doit installer au préalable `Mercure`.

On clique alors sur `ctrl + c` pour quitter la génération de l'entité.

Si installé, `Symfony UX Turbo` permettra de charger les pages plus rapidement, en ne chargeant que les éléments qui changent grâce à du JavaScript.

Nous le ferons plus tard. Voici la documentation de `Symfony UX Turbo` :

https://github.com/symfony/ux-turbo#broadcast-doctrine-entities-update

Pour installer `Mercure`, et donc pouvoir accepter le `Add the ability to broadcast entity updates using Symfony UX Turbo? (yes/no)` on tape :

```bash
composer require symfony/mercure-bundle"
```

Ensuite, on tape à nouveau :

```bash
php bin/console make:entity
```
Et on choisit dans le bash :

```bash
micha@HP-Victus MINGW64 ~/MesDocuments/SITES/2024/SymfonyLast0724 (main)
$ php bin/console make:entity

 Class name of the entity to create or update (e.g. VictoriousKangaroo):
 > Article
Article

 Add the ability to broadcast entity updates using Symfony UX Turbo? (yes/no) [no]:
 > yes

 created: src/Entity/Article.php
 created: src/Repository/ArticleRepository.php
 created: templates/broadcast/Article.stream.html.twig

 Entity generated! Now let\'s add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > Title

 Field type (enter ? to see all types) [string]:
 >


 Field length [255]:
 > 180

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Article.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > Text

 Field type (enter ? to see all types) [string]:
 > text
text

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Article.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > CreateDate

 Field type (enter ? to see all types) [string]:
 > datetime
datetime

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Article.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > UpdateDate

 Field type (enter ? to see all types) [string]:
 > datetime
datetime

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Article.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > PublishedDate

 Field type (enter ? to see all types) [string]:
 > datetime
datetime

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Article.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > IsPublished

 Field type (enter ? to see all types) [boolean]:
 > smallint
smallint

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Article.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >



  Success!


 Next: When you\'re ready, create a migration with php bin/console make:migration
```

Nous avons donc créé une entité `Article` avec les champs `Title`, `Text`, `CreateDate`, `UpdateDate`, `PublishedDate` et `IsPublished`.

**3 fichiers ont été créés :**
- `src/Entity/Article.php` qui est le mapping de la table `article` en base de données
- `src/Repository/ArticleRepository.php` qui est le repository de l'entité `Article` (pour les requêtes SQL supplémentaires)
- `templates/broadcast/Article.stream.html.twig` qui est le template pour le broadcast des entités

---

Retour au [Menu](#menu)

---

### Modification de l'entité avant la migration

Avant de faire la migration, on peut modifier l'entité `Article` dans le fichier `src/Entity/Article.php`.

Nous allons effectuer les modifications suivantes :

```php
### src/Entity/Article.php

### 

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[Broadcast]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    // nous allons indiquer que l'id est unsigned
    // en ajoutant `unsigned=true` à Column
    // #[ORM\Column]
    #[ORM\Column (options: ['unsigned' => true])]
    private ?int $id = null;

###
    // que le champs `CreateDate` ne doit avoir une valeur que lors de la création
    #[ORM\Column(type: Types::DATETIME_MUTABLE, 
    options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeInterface $CreateDate = null;

###

    // que la valeur par défaut de `IsPublished` est 0 et non signée
    #[ORM\Column(type: Types::SMALLINT,
        options: ['unsigned' => true, 'default' => 0])]
    private ?int $IsPublished = null;

```

---

Retour au [Menu](#menu)

---

### Création et exécution de la migration

Pour créer la migration, on tape :

```bash
php bin/console make:migration
```

Un fichier de migration est créé dans le dossier `migrations` à la racine du projet.

Pour exécuter la migration, on tape :

```bash
php bin/console doctrine:migrations:migrate
```

**Attention, cette commande va créer la table `article` dans la base de données et effacer le contenu de la table si elle existe déjà.**

2 autres tables sont créées automatiquement par Symfony : `doctrine_migration_versions` et `messenger_messages`.

Nous pouvons voir les tables créées dans la base de données `symfony_last_0724`.

---

Retour au [Menu](#menu)

---
