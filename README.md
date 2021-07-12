# HANDLE DOTENV LARAVEL 📃

Simple library for manipulating the .env file in the laravel ecosystem.
get variable or set value for variable simply and quickly.

## Usage

To use this library just follow the examples below:

#### To set variables
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var boolean
*/
$changed = HandleEnv::change(["APP_NAME=Laravel", "DB_HOST=127.0.0.1"], base_path(".env"));

```

#### To get all variables with values
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var array|string
*/
$variablesWithValues = HandleEnv::getAllKeysAndValues(base_path(".env"));

```


#### To get one variable with value
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var array|string
*/
$variableWithValue = HandleEnv::getOne("APP_NAME", base_path(".env"));

```

#### To get only all keys
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var array|string
*/
$allKeys = HandleEnv::getAllKeys(base_path(".env"));

```

#### To get only all values
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var array|string
*/
$allValues = HandleEnv::getAllValues(base_path(".env"));

```

#### To check if key exists
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var boolean
*/
$hasKey = HandleEnv::hasKey("APP_NAME", base_path(".env"));

```

#### To check if key exists
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var boolean
*/
$hasKey = HandleEnv::hasKey("APP_NAME", base_path(".env"));

```

#### To add variable
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var boolean
*/
$hasKey = HandleEnv::add("APP_X", "\"My Application\"", base_path(".env"));

```

#### To delete variable
```php
<?php

use JoseAugusto\App\HandleEnv;

/*
* @var boolean
*/
$hasKey = HandleEnv::delete("APP_X", base_path(".env"));

```


## Requirements
This library needs PHP 7.0 or greater.
