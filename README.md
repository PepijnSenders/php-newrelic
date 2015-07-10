[![Build Status](https://travis-ci.org/PepijnSenders/php-newrelic.svg?branch=master)](https://travis-ci.org/PepijnSenders/php-newrelic)

PHP NewRelic
============

Lightweight PHP client for NewRelic.

Installation
------------

Install this package with [Composer](https://getcomposer.org).

```shell
composer require pep/php-newrelic
```

Usage
-----

Demonstrating a simple method call, the method calls can be anything as long as they appear in `NewRelic`'s [API](https://docs.newrelic.com/docs/agents/php-agent/configuration/php-agent-api). You can format the functions however you want, with the `newrelic_` part discarded. So `NewRelic::NoticeError`, `NewRelic::notice_error` will both work, use it however you like.

```php
<?php

require_once 'vendor/autoload.php';

use Pep\NewRelic;

NewRelic::noticeError('Testing PHP client for NewRelic');
```

If the `NewRelic` PHP agent is not loaded, the function will die gracefully without exceptions. So you can run the functions without checks in your development environment.

If you're trying to call a function that does not exist, it will throw the `Pep\NewRelic\MethodNotFoundException` exception.

```php
<?php

require_once 'vendor/autoload.php';

use Pep\NewRelic;
use Pep\NewRelic\MethodNotFoundException as NewRelicMethodNotFoundException;

try {
  NewRelic::thisMethodDoesNotExist('Testing PHP client for NewRelic');
} catch (NewRelicMethodNotFoundException $e) {}
```
