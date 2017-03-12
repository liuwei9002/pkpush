<?php
/**
 * User: Peter Wang
 * Date: 17/2/4
 * Time: 下午5:34
 */

namespace App\Lib\Service;


class ValidateService
{
    public static function emailValidate($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}