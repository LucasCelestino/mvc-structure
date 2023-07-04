<?php

namespace App\Core;

class Session
{
    /**
     * @return bool
     */
    private static function startSession(): bool
    {
        if (!session_id()) {
            return session_start();
        }
    }

    /**
     * @return object|null
     */
    public function all(): ?object
    {
        self::startSession();

        return (object)$_SESSION;
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return Session
     */
    public static function set(string $key, $value): Session
    {
        self::startSession();

        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $_SESSION[$key];
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public static function unset(string $key): bool
    {
        self::startSession();

        unset($_SESSION[$key]);
        return true;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public static function has(string $key): bool
    {
        self::startSession();

        return isset($_SESSION[$key]);
    }

    /**
     * @return bool
     */
    public static function regenerate(): bool
    {
        self::startSession();

        if(!session_regenerate_id(true))
        {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public static function destroy(): bool
    {
        self::startSession();

        session_destroy();
        return true;
    }

    /**
     * @return Session
     */
    public static function csrf(): Session
    {
        self::startSession();

        $_SESSION['csrf_token'] = md5(uniqid(rand(), true));

        return $_SESSION['csrf_token'];
    }
}