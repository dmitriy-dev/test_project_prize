<?php


if (!function_exists('env')) {
    /**
     * @param string      $envName
     * @param string|null $default
     * @return string|null
     */
    function env(string $envName, string $default = null): ?string
    {
        return getenv($envName) ?? $default;
    }
}

if (!function_exists('flash')) {
    /**
     * @param string       $key
     * @param array|string $value
     */
    function flash(string $key, $value): void
    {
        if (is_string($value)) {
            $value = [$value];
        }

        $_SESSION['flash'][$key] = $value;
    }
}

if (!function_exists('hasFlash')) {
    /**
     * @param string $key
     * @return string|null
     */
    function hasFlash(string $key): ?string
    {
        return isset($_SESSION['flash'][$key]);
    }
}

if (!function_exists('getFlash')) {
    /**
     * @param string $key
     * @return string|null|array
     */
    function getFlash(string $key)
    {
        $value = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $value;
    }
}


