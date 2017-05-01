# Config

The Config library provides a simple interface for adding configuration values. All config files are loaded lazily only when invoked providing a clean yet efficient way of managing config.

## Installation

Install with composer at `krak/config`

## Usage

All Config is managed via the ConfigStore. `Config\store` provides a default instance which will lazy load files/data and will cache the results to prevent multiple filesystem calls.

### Adding Config Items

Adding multiple entries under the same key will merge the data when it's retrieved. The entries added last will overwrite the previous entries.

```php
<?php

$config = Krak\Config\store();
// add array data
$config->add('a', [
    'from_array' => true,
    'b' => ['c' => 1]
]);
$config->add('a', function() {
    return ['from_closure' => true],
});
// You can add, php, ini, json, or yml files, but you must provide the full path
$config->add('a', __DIR__ . '/path/a.php');

// or you can use this helper for files
$config->addFiles(__DIR__ . '/path', [
    'a.php',
]);
$config->addPhpFiles(__DIR__ . '/path', ['a']); // this is the exact same as above
```

PHP configuration files must return an array like so:

```php
<?php

return [
    'from_php_file' => true
];
```

**Note:** For YAML files, you must install the Symfony YAML Component (`symfony/yaml`).

### Getting Config Items

```php
<?php

var_dump($config->get('a'));

// or retrieve nested items
$config->get('a.b.c');
```

This will display something like:

```
array(4) {
  ["from_array"]=>
  bool(true)
  ["from_closure"]=>
  bool(true)
  ["from_php_file"]=>
  bool(true)
}
```
