<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/JoppeDC/SyliusBetterSeoPlugin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/JoppeDC/SyliusBetterSeoPlugin/?branch=master)
[![Build Status](https://travis-ci.org/JoppeDC/SyliusBetterSeoPlugin.svg?branch=master)](https://travis-ci.org/JoppeDC/SyliusBetterSeoPlugin)

<h1 align="center">Sylius Better SEO Plugin</h1>
    
<p align="center">

  - Adds configurable SEO meta tags, image and Google rich snippets to product pages.
  
  - Adds configurable SEO meta tags and image to taxon pages.
  
</p>

## Installation

Sylius 2.x, PHP 8.2 to 8.5, Doctrine ORM 3.

1. Require plugin with composer:

    ```json
    "repositories": {
        "akkiSyliusBetterSeoPlugin": {
            "type": "vcs",
            "url": "https://github.com/akki-team/SyliusBetterSeoPlugin.git"
        }
    }
    ```

    ```bash
    composer require akki-team/sylius-better-seo-plugin:^2.1
    ```

2. Add plugin class to your `bundles.php`.

    ```php
    JoppeDc\SyliusBetterSeoPlugin\SyliusBetterSeoPlugin::class => ['all' => true],
    ```

3. Import resources:

    ```yaml
    imports:
        - { resource: "@SyliusBetterSeoPlugin/Resources/config/config.yaml" }
    ```

    To get the SEO section in the product and taxon admin forms (create and update), also import the Twig hooks:

    ```yaml
    imports:
        - { resource: "@SyliusBetterSeoPlugin/Resources/config/twig_hooks.yaml" }
    ```

4. Override Product and Taxon resource:

    Add `HasSeoInterface` and `SeoTrait` to the Product and Taxon entities, and map the `seo` association with attributes
    (the trait's annotations are not read by Doctrine ORM 3):

    ```php
    #[ORM\OneToOne(targetEntity: SeoInterface::class, cascade: ['all'])]
    #[ORM\JoinColumn(name: 'seo_id', referencedColumnName: 'id')]
    protected $seo;
    ```

    `SeoInterface` is resolved to the configured model (`sylius_better_seo_plugin.seo`), which can be overridden:

    ```yaml
    sylius_resource:
        resources:
            sylius_better_seo_plugin.seo:
                classes:
                    model: App\Entity\Seo\Seo
    ```

5. Finish the installation by updating the database schema

    ```
    $ bin/console doctrine:migrations:diff
    $ bin/console doctrine:migrations:migrate
    ```


## Examples

<img align="center" src="https://imgur.com/wTZtSDa.jpg" alt="Kitten" title="Google Preview" height="150" >
<img align="center" src="https://imgur.com/wvLt5em.jpg" alt="Kitten" title="Facebook Preview" height="150" >
<img align="center" src="https://imgur.com/hMNvu2C.jpg" alt="Kitten" title="Twitter Preview" height="150" >

## Documentation

* [Local development](docs/LOCAL_DEVELOPMENT.md)

## License

[The MIT License (MIT)](LICENSE)

Copyright © 2019 Joppe De Cuyper
