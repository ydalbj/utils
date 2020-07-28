<?php

namespace Ydalbj\Utils\Helpers;

class CommonHelper
{
    /**
     * 数字转字符串，如果是大整形，后缀加L
     * @param int num
     * @return string str
     */
    public static function int2String($num) : string
    {
        $str = strval($num);
        if ($num >= pow(2, 32)) {
            $str = "{$num}L";
        }
        return $str;
    }
}
