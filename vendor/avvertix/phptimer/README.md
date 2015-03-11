PhpTimer
========

An easy to use 100% native PHP library to profile PHP code.


**Original Authors**

- [Tamas Kalman](https://github.com/ktamas77)
- [Joseph Bergevin](https://github.com/josephbergevin)

# Introduction

A simple class to keep track of the time it takes to run processes in your code.

Features:

- labeled timers


# Installation

## With composer

To add this package as a local, per-project dependency to your project, simply add a dependency on `avvertix/phptimer` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on `PhpTimer`:

```
{
    "require": {
        "avvertix/phptimer": "0.1.x"
    }
}
```

## Without composer

```php
	require_once 'src/PhpTimer.php';
```


# Usage

```php
  
  $timer = new PhpTimer();
  
  $timer->start('cycle');
  for ($i = 0; $i < 100000; $i++) {
    $a *= $i;
  }
  $timer->stop('cycle');
  
  for ($i = 0; $i < 10; $i++) {
    $timer->start("subloop");
    for ($j = 0; $j < 1000000; $j++) $a = $i * $j;
    $timer->stop("subloop");
  }  
  
  var_dump($timer->getAll());
```