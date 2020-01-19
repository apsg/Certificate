# Certificates

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
<!-- [![Build Status][ico-travis]][link-travis] -->
<!-- [![StyleCI][ico-styleci]][link-styleci] -->

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require apsg/certificate
```

## Usage

```php

use Apsg\Certificate\Certificate;
use Apsg\Certificate\Fields\Field;
use Apsg\Certificate\Formats\A4LandscapeFormat;

$certificate = new Certificate(null, new A4LandscapeFormat());

return $certificate
    ->setBackground('/path/to/file.png')
    ->addField(new Field('test text', 10, 100))
    ->generate();
// this will output the pdf to browser to download
 
```

Note: the background would be stretched to fill the page, so use proper resolution and orientation for best results.

## Testing

``` bash
$ composer test
```

[ico-version]: https://img.shields.io/packagist/v/apsg/certificate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/apsg/certificate.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/apsg/certificate/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/apsg/certificate
[link-downloads]: https://packagist.org/packages/apsg/certificate
[link-travis]: https://travis-ci.org/apsg/certificate
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/apsg
[link-contributors]: ../../contributors
