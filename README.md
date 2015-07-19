ShayganTelegramBotApiBundle
===================

A symfony2 wrapper bundle for  [Telegram Bot API](https://core.telegram.org/bots/api) with some tiny feature.

## Install

Via Composer

``` bash
$ composer require shaygan/telegram-bot-api-bundle
```

Edit your app/AppKernel.php to register the bundle in the registerBundles() method as above:


```php
class AppKernel extends Kernel
{

    public function registerBundles()
    {
        $bundles = array(
            // ...
            // register the bundle here
            new Shaygan\TelegramBotApiBundle(),
        );
    }
}
```

## Configure the bundle

This bundle was designed to just work out of the box. The only thing you have to configure in order to get this bundle up and running is your bot [token](https://core.telegram.org/bots#botfather).

```yaml
# app/config/config.yml

shaygan_telegram_bot_api:
    token: xxxxx:yyyyyyyyyyyyyyyyyyyy
```

If you want to use web-hook, add the bundle's routing configuration in app/config/routing.yml :

```yaml
shaygan_telegram_bot_api:
    resource: @ShyaganTelegramBotApi/Resources/config/routing.yml

```
And add your domain name, url prefix (if needed) and you update receiver service name (a sample update receiver is included) to the configuration file:
```yaml
# app/config/config.yml

shaygan_telegram_bot_api:
    #...
    web_hook:
        domain: example.com
        path_prefix: ~ # you can add prefix, if your web site is not on the root
        update_receiver: shaygan.my_update_receiver # sample update receiver
```
*note: Telegram do not support http, your site should have valid SSL (HTTPS).*

## Usage


Wherever you have access to the service container :
```php
<?php
    // get the telegram api as a service
    $api = $this->container->get('shaygan.telegram_bot_api');

    // test the API by calling getMe method
    $user = $api->getMe();

?>
```

## Testing

Not implemented yet

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
