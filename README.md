# Immortal Framework

[![Join the chat at https://gitter.im/Immortal-Framework/Lobby](https://badges.gitter.im/Immortal-Framework/Lobby.svg)](https://gitter.im/Immortal-Framework/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/theahmadzai/Immortal-Framework.svg?branch=master)](https://travis-ci.org/theahmadzai/Immortal-Framework)
[![Coverage Status](https://coveralls.io/repos/github/theahmadzai/Immortal-Framework/badge.svg?branch=master)](https://coveralls.io/github/theahmadzai/Immortal-Framework?branch=master)
[![Code Climate](https://codeclimate.com/github/theahmadzai/Immortal-Framework/badges/gpa.svg)](https://codeclimate.com/github/theahmadzai/Immortal-Framework)
[![HHVM Status](http://hhvm.h4cc.de/badge/theahmadzai/immortal-framework.svg?style=flat)](http://hhvm.h4cc.de/package/theahmadzai/immortal-framework)
[![Total Downloads](https://poser.pugx.org/theahmadzai/immortal-framework/downloads)](https://packagist.org/packages/theahmadzai/immortal-framework)
[![Latest Stable Version](https://poser.pugx.org/theahmadzai/immortal-framework/v/stable)](https://packagist.org/packages/theahmadzai/immortal-framework)
[![License](https://poser.pugx.org/theahmadzai/immortal-framework/license)](https://packagist.org/packages/theahmadzai/immortal-framework)

Immortal-Framework is a library Package for Immortal-Application, Contains all the core functionality required to build an awesome web application.

## Requirements

Supports the following versions of PHP.

- PHP 7.0
- PHP 7.1
- HHVM

## Installation

> **Note:** This repository only contains the core functionality. If you want to build an application using Immortat-Framework, visit the main [Immortal Application repository](https://github.com/theahmadzai/immortal-application).

It's recommended that you use [Composer](https://getcomposer.org/) to install Immortal-Framework.

```bash
$ composer require theahmadzai/immortal-framework
```

This will install Immortal-Framework and all required dependencies.

## Tests

To execute the test suite, you'll need phpunit.

```bash
$ ./vendor/bin/phpunit
```

## Contributing

### Pull Requests

1. Fork the Immortal-Framework repository
2. Create a new branch for each feature or improvement
3. Send a pull request from each feature branch to the **public** branch

### Style Guide

All pull requests must adhere to the [PSR-2 standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

You can use following command to check for PSR-2 coding standard.

```bash
$ ./vendor/bin/phpcs
```

To fix code for PSR-2 standard automatically.

```bash
$ ./vendor/bin/phpcbf
```

## Security

If you discover security related issues, please email theahmadzai@hotmail.com instead of using the issue tracker. All security issues will be promptly addressed.

## License

The Immortal Framework is licensed under the MIT license. See [License File](LICENSE.md) for more information.
