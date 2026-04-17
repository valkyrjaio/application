<p align="center"><a href="https://valkyrja.io" target="_blank">
    <img src="https://raw.githubusercontent.com/valkyrjaio/art/refs/heads/master/full-logo/orange/php.png" width="400">
</a></p>

# Valkyrja

[Valkyrja][Valkyrja url] is a PHP framework for web and console applications.

About Valkyrja
------------

> This repository contains the skeleton code of an application built with the
> Valkyrja framework.

Valkyrja (pronounced "Valk-ear-ya") is the Old Norse spelling for Valkyrie, a
mythical creature that would guide warriors to Valhalla (the afterlife and a
better place) after death. In a similar sense, the Valkyrja framework guides
your application to be in a better state. Let this fast, light, and robust
framework do the heavy lifting for your app.

<p>
    <a href="https://packagist.org/packages/valkyrja/application"><img src="https://poser.pugx.org/valkyrja/application/require/php" alt="PHP Version Require"></a>
    <a href="https://packagist.org/packages/valkyrja/application"><img src="https://poser.pugx.org/valkyrja/application/v" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/valkyrja/application"><img src="https://poser.pugx.org/valkyrja/application/license" alt="License"></a>
    <!-- <a href="https://packagist.org/packages/valkyrja/application"><img src="https://poser.pugx.org/valkyrja/application/downloads" alt="Total Downloads"></a>-->
    <a href="https://scrutinizer-ci.com/g/valkyrjaio/application/?branch=master"><img src="https://scrutinizer-ci.com/g/valkyrjaio/application/badges/quality-score.png?b=master" alt="Scrutinizer"></a>
    <!-- <a href="https://coveralls.io/github/valkyrjaio/application?branch=master"><img src="https://coveralls.io/repos/github/valkyrjaio/application/badge.svg?branch=master" alt="Coverage Status" /></a> -->
    <a href="https://shepherd.dev/github/valkyrjaio/application"><img src="https://shepherd.dev/github/valkyrjaio/application/coverage.svg" alt="Psalm Shepherd" /></a>
    <a href="https://sonarcloud.io/summary/new_code?id=valkyrjaio_application"><img src="https://sonarcloud.io/api/project_badges/measure?project=valkyrjaio_application&metric=sqale_rating" alt="Maintainability Rating" /></a>
</p>

Build Status
------------

<table>
    <tbody>
        <tr>
            <td>Linting</td>
            <td>
                <a href="https://github.com/valkyrjaio/application/actions/workflows/phpcodesniffer.yml?query=branch%3Amaster"><img src="https://github.com/valkyrjaio/application/actions/workflows/phpcodesniffer.yml/badge.svg?branch=master" alt="PHP Code Sniffer Build Status"></a>
            </td>
            <td>
                <a href="https://github.com/valkyrjaio/application/actions/workflows/phpcsfixer.yml?query=branch%3Amaster"><img src="https://github.com/valkyrjaio/application/actions/workflows/phpcsfixer.yml/badge.svg?branch=master" alt="PHP CS Fixer Build Status"></a>
            </td>
        </tr>
        <tr>
            <td>Coding Rules</td>
            <td>
                <a href="https://github.com/valkyrjaio/application/actions/workflows/phparkitect.yml?query=branch%3Amaster"><img src="https://github.com/valkyrjaio/application/actions/workflows/phparkitect.yml/badge.svg?branch=master" alt="PHPArkitect Build Status"></a>
            </td>
            <td>
                <a href="https://github.com/valkyrjaio/application/actions/workflows/rector.yml?query=branch%3Amaster"><img src="https://github.com/valkyrjaio/application/actions/workflows/rector.yml/badge.svg?branch=master" alt="Rector Build Status"></a>
            </td>
        </tr>
        <tr>
            <td>Static Analysis</td>
            <td>
                <a href="https://github.com/valkyrjaio/application/actions/workflows/phpstan.yml?query=branch%3Amaster"><img src="https://github.com/valkyrjaio/application/actions/workflows/phpstan.yml/badge.svg?branch=master" alt="PHPStan Build Status"></a>
            </td>
            <td>
                <a href="https://github.com/valkyrjaio/application/actions/workflows/psalm.yml?query=branch%3Amaster"><img src="https://github.com/valkyrjaio/application/actions/workflows/psalm.yml/badge.svg?branch=master" alt="Psalm Build Status"></a>
            </td>
        </tr>
        <tr>
            <td>Testing</td>
            <td>
                <a href="https://github.com/valkyrjaio/application/actions/workflows/phpunit.yml?query=branch%3Amaster"><img src="https://github.com/valkyrjaio/application/actions/workflows/phpunit.yml/badge.svg?branch=master" alt="PHPUnit Build Status"></a>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

Installation
------------

### Clone this repo locally.

```
git clone git@github.com:valkyrjaio/application.git ./your-project
cd your-project
composer install
```

### Install via composer

```
composer create-project valkyrja/application your-project
```

### Start coding

You're now able to start coding your application. Feel free to remove any
code that you don't need from this skeleton. All of this code exists as an
example. Read the documentation if you need to know how to do something
specific and don't yet know how to do it.

Documentation
-------------

The Valkyrja [documentation][docs url] is baked into the repo so you can
access it even when working offline.

[Valkyrja url]: https://valkyrja.io

[Valkyrja Application url]: https://github.com/valkyrjaio/application

[docs url]: https://github.com/valkyrjaio/valkyrja/tree/master/src/Valkyrja/README.md
