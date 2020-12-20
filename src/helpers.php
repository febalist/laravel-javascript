<?php

use Febalist\Laravel\JavaScript\JavaScript;

if (!function_exists('javascript')) {
    function javascript(): JavaScript
    {
        $instance = app(JavaScript::class);

        $arguments = func_get_args();

        if (count($arguments) === 2) {
            $arguments[0] = [$arguments[0] => $arguments[1]];
        }

        if ($arguments && is_array($arguments[0])) {
            foreach ($arguments[0] as $key => $value) {
                $instance->set($key, $value);
            }
        }

        return $instance;
    }
}
