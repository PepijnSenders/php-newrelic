<?php namespace Pep;

use Pep\NewRelic\Str;
use Pep\NewRelic\FunctionNotFoundException as NewRelicFunctionNotFoundException;

class NewRelic
{
    public static $extensionLoaded;

    public static function __callStatic($name, $arguments)
    {
        if (self::$extensionLoaded || extension_loaded('newrelic')) {
            self::$extensionLoaded = true;
            $newRelicFunctionName = Str::snake('newrelic_' . $name);
            if (function_exists($newRelicFunctionName)) {
                call_user_func_array($name, $arguments);
            } else {
                throw new NewRelicFunctionNotFoundException("Function $name does not exist");
            }
        }
    }
}
