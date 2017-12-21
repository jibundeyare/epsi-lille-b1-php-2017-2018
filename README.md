# php & mysql

## arborescence d'un projet en php simple

    projet/
        config/
            *.yml
        public/
            .htaccess
            *.php
        templates/
            *.twig
        var/
            cache/
        vendor/
        composer.json
        composer.lock
        README.md

## packages

Avec php 5.6 :

    composer require doctrine/dbal:^2.5.0

Avec php >= 7.0 :

    composer require doctrine/dbal:^2.6.0


    composer require symfony/yaml ^3.4
    composer require twig/twig

    php -S localhost:8000

[getcomposer.org](https://getcomposer.org/)

# tester composer

composer -v

# aller dans le dossier du projet web
cd c:\wamp64\www\cours-php.dev

# rechercher un paquet
composer search yaml

# afficher les infos d'un paquet
composer info -a symfony/yaml

# installer un paquet
composer require symfony/yaml

## doc

- [The Yaml Component (Symfony 3.4 Docs)](http://symfony.com/doc/3.4/components/yaml.html)
- [Welcome to Doctrine DBAL’s documentation! — Doctrine DBAL 2 documentation](http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/)
- [3. Configuration — Doctrine DBAL 2 documentation](http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html)
- [4. Data Retrieval And Manipulation — Doctrine DBAL 2 documentation] (http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html)
