# Laravel IPTV Core - FelipeMateus\IPTVCore


  
  

## Instaling

  

Tested in Laravel 8.54.

  

### Run the command below in root to install the package in your project.

  

```bash

composer require felipemateus/iptv-core  

```


### Verify this file 'config/app.php'


```php

<?php

...

'providers' => [

...

FelipeMateus\IPTVCore\IPTVProvider::class
...
 

];  

```
  

### Migrate the database 
  

```bash
php artisan migrate
```
  

## License

  

[![License](http://poser.pugx.org/felipemateus/iptv-customers/license)](https://packagist.org/packages/felipemateus/iptv-customers)

  

## Author

  

[Felipe Mateus](https://eufelipemateus.com)
