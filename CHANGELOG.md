
# Change Log
All notable changes to this project will be documented in this file.
 
The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).
 
## [2.1.0]

- SEO section in the product (create and update) and taxon admin forms, as Twig hooks to import (`Resources/config/twig_hooks.yaml`)
- SEO form types use the configured model classes (`sylius_better_seo_plugin.model.*.class`)
- `Length` constraints of `SeoTranslationType` configured with named arguments (Symfony 7.3 deprecation)
- Removed the Sylius 1 product form menu listener and its tab template

## [1.0.0] - 2020-01-10
 
The original release of the project. 
