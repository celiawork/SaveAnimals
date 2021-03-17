<?php

class Security
{

    public static function secureHTML($string)
    {

        return htmlentities($string);
    }

    public static function genercookiePassword()
    {
        $ticket = session_id().microtime().rand(0,9999999);
        $ticket = hash("sha512", $ticket);
        setcookie(COOKIE_PROTECT, $ticket, time() + (60 * 20));
        $_SESSION[COOKIE_PROTECT] = $ticket;
    }


    public static function verificationCookie()
    {
        if(isset($_SESSION[COOKIE_PROTECT]) && $_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT]){
            Security::generCookiePassword();
            return true;
        } else {
            session_destroy();
            throw new Exception("Vous n'avez pas le droit d'être là !");
        }
    }


    public static function verifAccessSession()

    {
        return (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin");
    }

    public static function verificationAccess()

    {
        return (self::verifAccessSession() && self::verificationCookie());
    }
}
