#### Installation:
```
composer require "glevolod/chain-command-bundle":"dev-master"
```
#### Usage:
To add command in chain just implement bare interface `Glevolod\ChainCommandBundle\Custom\ChainedCommandInterface`.

To run commands chain need to execute `php bin/console glevolod:main-command` in console.