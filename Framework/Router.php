<?php

namespace Framework;

class Router
{
    public static function redirect($to)
    {
        header("Location: {$to}");
        die;
    }
}