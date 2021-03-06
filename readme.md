# Certificates

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis] 
[![StyleCI][ico-styleci]][link-styleci] 

Helper package to provide easy PDF certificates generation. 
It uses FPDI/FPDF under the hood and is configured to provide support for Polish language.
It works as a Laravel 5/6 package but there is not much of Laravel specific functionality added, so it can be used in other projects as well.

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

class CertificateController extends Controller
{
    /**
     * This will output the pdf to browser to download
     */
    public function test()
    {
        $certificate = new Certificate(null, new A4LandscapeFormat());

        return $certificate
            ->setBackground(storage_path('app/public/tlo.png'))
            ->addField(new Field('test zażółć gęślą', 10, 100, 20))
            ->generate();
    }
}
 
```

Note: the background would be stretched to fill the page, so use proper resolution and orientation for best results.

## Testing

``` bash
$ composer test
```

[ico-version]: https://img.shields.io/packagist/v/apsg/certificate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/apsg/certificate.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/apsg/certificate/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/234774514/shield

[link-packagist]: https://packagist.org/packages/apsg/certificate
[link-downloads]: https://packagist.org/packages/apsg/certificate
[link-travis]: https://travis-ci.org/apsg/certificate
[link-styleci]: https://styleci.io/repos/234774514
[link-author]: https://github.com/apsg
[link-contributors]: ../../contributors
