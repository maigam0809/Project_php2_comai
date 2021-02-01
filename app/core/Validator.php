<?php

namespace App\Core;

class Validator
{
    public static function isNull($variable)
    {
        if (empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isEmptyFile($variable)
    {
        if ($_FILES[$variable] && $_FILES[$variable]['size'] === 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function notImage($variable)
    {
        if (
            $_FILES[$variable] &&
            $_FILES[$variable]['type'] !== 'image/png' &&
            $_FILES[$variable]['type'] !== 'image/jpg' &&
            $_FILES[$variable]['type'] !== 'image/jpeg'
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function maxSize($variable, $size = 2)
    {
        // convert from byte to mb
        $size = $size * 1024 * 1024;
        if ($_FILES[$variable]['size'] < $size) {
            return true;
        } else {
            return false;
        }
    }

}
