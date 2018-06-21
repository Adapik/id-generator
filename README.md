# Id Generator
[![Build Status](https://travis-ci.org/Adapik/id-generator.svg?branch=master)](https://travis-ci.org/adapik/id-generator)

## Installation

Installation of this package uses Composer. For Composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

Run `composer require adapik/id-generator` to install id-generator.

## About

This library unifies the way of generating ids in your app and provides different implementations. It allows you to change implementation later (AI ids, UUID, etc.) or use your custom strategy.
F.i. you can inject id-generator in your ApplicationService and generate identifier before entity created:

```php
$id = $generator->nextIdentity();
...

$entity = new Entity($id, ...)
```

## Usage

You can implement `Adapik\IdGenerator\IdentityGeneratorInterface` or use Postgres, Uuid or InMemory implementations.

```php
use Adapik\IdGenerator\UuidIdentityGenerator;

$generator = new UuidIdentityGenerator();
$generator = new PostgresSequenceIdentityGenerator($pdo, $sequenceName);
...

$id = $generator->nextIdentity();
```

If you want to use `id-generator` in your Repository you can use `IdentityGeneratorTrait`.

## TODO

Integration with doctrine