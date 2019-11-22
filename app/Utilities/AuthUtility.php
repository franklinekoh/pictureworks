<?php
namespace App\Utilities;


class AuthUtility
{

    public static function check($password){
        return strtoupper($password) === '720DF6C2482218518FA20FDC52D4DED7ECC043AB';
    }
}