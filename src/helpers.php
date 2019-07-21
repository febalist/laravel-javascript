<?php

if (!function_exists('javascript')) {
    function javascript()
    {
        return JavaScript::put(...func_get_args());
    }
}
