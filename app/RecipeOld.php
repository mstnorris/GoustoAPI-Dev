<?php

namespace App;

class RecipeOld
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function createFromCsvFile($filePath)
    {
        File::put('test', 'c');
    }
}