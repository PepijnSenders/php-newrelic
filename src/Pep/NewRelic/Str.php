<?php namespace Pep\NewRelic;

class Str
{

    public static function snake($value)
    {
        if (!ctype_lower($value)) {
            $value = strtolower(preg_replace('/(.)(?=[A-Z])/', '$1_', $value));
            $value = preg_replace('/\s+/', '', $value);
        }

        return $value;
    }
}
