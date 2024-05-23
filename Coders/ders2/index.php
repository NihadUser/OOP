<?php
class Circle
{
    public static $shapeName;

    public static function set($name): void
    {
        self::$shapeName = $name;
    }
}

Circle::set('name');
// echo $name;

echo Circle::$shapeName;