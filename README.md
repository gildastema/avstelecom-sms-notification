# Laravel Notification for SMS AVSTELECOM

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tematech/avstelecomsms.svg?style=flat-square)](https://packagist.org/packages/tematech/avstelecomsms)
[![Build Status](https://img.shields.io/travis/tematech/avstelecomsms/master.svg?style=flat-square)](https://travis-ci.org/tematech/avstelecomsms)
[![Quality Score](https://img.shields.io/scrutinizer/g/tematech/avstelecomsms.svg?style=flat-square)](https://scrutinizer-ci.com/g/tematech/avstelecomsms)
[![Total Downloads](https://img.shields.io/packagist/dt/tematech/avstelecomsms.svg?style=flat-square)](https://packagist.org/packages/tematech/avstelecomsms)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require tematech/avstelecomsms

php artisan vendor:publish --provider='Tematech\Avstelecomsms\AvstelecomsmsServiceProvider'
```

## Usage

``` php
/**
 * In notifiable 
 * */
 public function routeNotificationForAvstelecom()
    {
        return $this->phone;
    }

 /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['avstelecom'];
    }

    public function toAvstelecom($notifiable){
        return [
          'message' => ''
        ];
    }
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gildastema3@gmail.com instead of using the issue tracker.

## Credits

- [Gildas Tema](https://github.com/tematech)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
