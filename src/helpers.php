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
        $xRequestedWith = element($_SERVER, 'HTTP_X_REQUESTED_WITH');
        return $xRequestedWith && strtolower($xRequestedWith) === 'xmlhttprequest';
    }
}

if (!function_exists('element')) {
    function element($array, $key, $default = null)
    {
        return is_array($array) && key_exists($key, $array) ? $array[$key] : $default;
    }
}

if (!function_exists('ddd')) {
    function ddd(...$_)
    {
        if ($dbg = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)) {
            $dbgCurrent = current($dbg);
        }

        $callFrom = !empty($dbgCurrent)
            ? element($dbgCurrent,'file') . ':' . element($dbgCurrent, 'line')
            : __FILE__.':'.__LINE__;

        if (is_ajax()) {

            var_export($_);

            print PHP_EOL . PHP_EOL . $callFrom;

            die;

        } else {

            call_user_func_array('dd', array_merge($_, [$callFrom]));
        }
    }
}

if (!function_exists('dd')) {
    function dd()
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
            ? element($dbgCurrent,'file') . ':' . element($dbgCurrent, 'line')
            : __FILE__.':'.__LINE__;

        print PHP_EOL . PHP_EOL . $callFrom;

        print (is_cli() ? PHP_EOL. '---' . PHP_EOL : '</pre>');

        die;
    }
}