# HANDLE DOTENV LARAVEL 📃

Simple library for manipulating the .env file in the laravel ecosystem.
get variable or set value for variable simply and quickly.

## Usage

To use this library just follow the examples below:

#### To set variables on dotenv
```php
<?php

use JoseAugusto\App\HandleEnv;

HandleEnv::changeEnv(["APP_NAME=Laravel", "DB_HOST=127.0.0.1"], base_path(".env"));

```


## Requirements
This library needs PHP 7.0 or greater.