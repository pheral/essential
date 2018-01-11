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

if (!function_exists('call_from')) {

    function call_from($limit = 3)
    {
        if ($dbg = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $limit)) {
            $dbgCurrent = next($dbg);
        }

        $callFrom = !empty($dbgCurrent)
            ? element($dbgCurrent,'file') . ':' . element($dbgCurrent, 'line')
            : __FILE__.':'.__LINE__;

        return $callFrom;
    }
}

if (!function_exists('ddd')) {
    function ddd(...$_)
    {
        $callFrom = call_from();

        if (is_ajax()) {

            var_export($_);

            print PHP_EOL . PHP_EOL . $callFrom;

            die;

        } else {

            call_user_func_array('dd', array_merge($_, ['DEBUG_CALL_FROM', $callFrom]));
        }
    }
}

if (!function_exists('dd')) {
    function dd(...$_)
    {
        $flagDebugCallFrom = array_search('DEBUG_CALL_FROM', $_, true);

        $hasFlagDebugCallFrom = ($flagDebugCallFrom !== false);

        if ($hasFlagDebugCallFrom) {
            $callFrom = $_[$flagDebugCallFrom + 1];
            unset($_[$flagDebugCallFrom], $_[$flagDebugCallFrom + 1]);
        }

        print (is_cli() ? PHP_EOL : '<pre style="border:1px solid red; background: orange">');

        array_map(function ($arg) {

            print print_r($arg, true) . (is_cli() ? PHP_EOL : '<br />');

        }, $_);

        print (is_cli() ? PHP_EOL : '<hr />');

        $callFrom = !empty($callFrom) ? $callFrom : call_from();

        print PHP_EOL . PHP_EOL . $callFrom;

        print (is_cli() ? PHP_EOL. '---' . PHP_EOL : '</pre>');

        die;
    }
}