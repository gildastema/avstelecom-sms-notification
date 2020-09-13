# Laravel Notification for SMS AVSTELECOM

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tematech/avstelecomsms.svg?style=flat-square)](https://packagist.org/packages/tematech/avstelecomsms)
[![Build Status](https://img.shields.io/travis/gildastema/avstelecom-sms-notification/master.svg?style=flat-square)](https://travis-ci.org/gildastema/avstelecom-sms-notification)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gildastema/avstelecom-sms-notification/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gildastema/avstelecom-sms-notification/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/gildastema/avstelecom-sms-notification/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gildastema/avstelecom-sms-notification/build-status/master)
[![Total Downloads](https://img.shields.io/packagist/dt/tematech/avstelecomsms.svg?style=flat-square)](https://packagist.org/packages/tematech/avstelecomsms)

This library help you to send sms via laravel notification use avstelecom SARL 
provider sms in cameroon 

## Installation

You can install the package via composer:

```bash
composer require tematech/avstelecomsms

php artisan vendor:publish --provider='Tematech\Avstelecomsms\AvstelecomsmsServiceProvider'

Configuration  .env 

AVSTELECOM_ID=
AVSTELECOM_KEY=
AVSTELECOM_SECRET=
AVSTELECOM_TOKEN=
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
          'message' => '' // message sms
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
