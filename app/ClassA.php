<?php

namespace App;

class ClassA
{

    protected static string $name = "A";

    // public function getName()
    // {
    //     return $this->name;
    // }

    // public static function getName()
    // {
    //     var_dump(get_called_class());
    //     return self::$name;
    // }

    public static function getName()
    {
        var_dump(get_called_class());
        return static::$name;
    }
}
