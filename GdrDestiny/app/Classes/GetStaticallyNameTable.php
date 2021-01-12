<?php

namespace App\Classes;

trait GetStaticallyNameTable
{
    public static function tableName()
    {
        return with(new static)->getTable();
    }
}


?>