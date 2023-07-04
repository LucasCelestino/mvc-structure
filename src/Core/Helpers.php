<?php

use App\Core\Session;

/**
 * @param string $email
 *
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $string
 *
 * @return string
 */
function str_title(string $string): string
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

/**
 * @param string $url
 *
 * @return void
 */
function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }
}

/**
 * @return string
 */
function csrf_input(): string
{
    $sessionCsrfToken = Session::csrf();
    return "<input type='hidden' name='csrf' value='" . ($sessionCsrfToken ?? "") . "'/>";
}