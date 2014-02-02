Dimensions
==========

Dimensions

[![Latest Stable Version](https://poser.pugx.org/ebidtech/dimensions/v/stable.png)](https://packagist.org/packages/ebidtech/dimensions) [![Build Status](https://travis-ci.org/ebidtech/dimensions.png?branch=master)](https://travis-ci.org/ebidtech/dimensions) [![Coverage Status](https://coveralls.io/repos/ebidtech/dimensions/badge.png?branch=master)](https://coveralls.io/r/ebidtech/dimensions?branch=master) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/ebidtech/dimensions/badges/quality-score.png?s=2d44d92b4ad2e0c9db53bc4c5526dcdc786a2bd5)](https://scrutinizer-ci.com/g/ebidtech/dimensions/) [![Dependency Status](https://www.versioneye.com/user/projects/52ee79c6ec1375209d000029/badge.png)](https://www.versioneye.com/user/projects/52ee79c6ec1375209d000029)

## Requirements ##

* PHP >= 5.4

## Installation ##

The recommended way to install is through composer.

Just create a `composer.json` file for your project:

``` json
{
    "require": {
        "ebidtech/dimensions": "@stable"
    }
}
```

**Tip:** browse [`ebidtech/dimensions`](https://packagist.org/packages/ebidtech/dimensions) page to choose a stable version to use, avoid the `@stable` meta constraint.

And run these two commands to install it:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install
```

Now you can add the autoloader, and you will have access to the library:

```php
<?php

require 'vendor/autoload.php';
```

## Usage ##

For now for usage example look on [tests code](tests/EBT/Dimensions/Tests)

## Contributing ##

See CONTRIBUTING file.

## Credits ##

* Ebidtech developer team, common object Lead developer [Filipe Silva](https://github.com/eb-fsilva) (filipe.silva@ebidtech.com).
* [All contributors](https://github.com/ebidtech/dimensions/contributors)

## License ##

Common object library is released under the MIT License. See the bundled LICENSE file for details.

