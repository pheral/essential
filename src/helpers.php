<?php

if (!function_exists('is_cli')) {
    function is_cli()
    {
        return 'cli' === PHP_SAPI;
    }
}

if (!function_exists('is_ajax')) {
    function is_ajax()
    {
        $xRequestedWith = arr_get($_SERVER, 'HTTP_X_REQUESTED_WITH');
        return $xRequestedWith && strtolower($xRequestedWith) === 'xmlhttprequest';
    }
}

if (!function_exists('arr_get')) {
    function arr_get($array, $key, $default = null)
    {
        return is_array($array) && key_exists($key, $array) ? $array[$key] : $default;
    }
}

if (!function_exists('arr_only')) {
    function arr_only($array, $keys = [])
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }
}

if (!function_exists('dbg')) {
    function dbg(...$_)
    {
        if ($dbg = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)) {
            $dbgCurrent = current($dbg);
        }

        $callFrom = !empty($dbgCurrent)
            ? implode(':', arr_only($dbgCurrent, ['file', 'line']))
            : __FILE__.':'.__LINE__;

        if (is_ajax()) {

            var_export($_);

            print PHP_EOL . PHP_EOL . $callFrom;

            die;

        } else {

            call_user_func_array('debug', array_merge($_, [$callFrom]));
        }
    }
}

if (!function_exists('debug')) {
    function debug()
    {
        print (is_cli() ? PHP_EOL : '<pre style="border:1px solid red; background: orange">');

        array_map(function ($arg) {

            print print_r($arg, true) . (is_cli() ? PHP_EOL : '<br />');

        }, func_get_args());

        print (is_cli() ? PHP_EOL : '<hr />');

        if ($dbg = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)) {
            $dbgCurrent = current($dbg);
        }

        $callFrom = !empty($dbgCurrent)
            ? implode(':', arr_only($dbgCurrent, ['file', 'line']))
            : __FILE__.':'.__LINE__;

        print PHP_EOL . PHP_EOL . $callFrom;

        print (is_cli() ? PHP_EOL. '---' . PHP_EOL : '</pre>');

        die;
    }
}