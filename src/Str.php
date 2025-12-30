<?php

namespace Kyledong\PhpTools;

class Str
{
    /**
     * 字符串长度
     * @param string $str
     * @return int
     */
    public static function len(string $str)
    {
        return mb_strlen($str);
    }
}