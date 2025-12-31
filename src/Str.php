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

    /**
     * 截取字符串
     * @param string $str
     * @param int $start
     * @param int|null $length
     * @return string
     */
    public static function substr(string $str, int $start, int $length = null)
    {
        return mb_substr($str, $start, $length,'UTF-8');
    }

    /**
     * 字符串是否包含子串
     * @param string $str
     * @param string $subStr
     * @return bool
     */
    public static function contain(string $str, string $subStr)
    {
        return mb_strpos($str, $subStr) !== false;
    }

    /**
     * 字符串是否以子串开头
     * @param string $str
     * @param string $subStr
     * @return bool
     */
    public static function first(string $str, string $subStr)
    {
        return str_starts_with($str, $subStr);
    }

    /**
     * 字符串是否以子串结尾
     * @param string $str
     * @param string $subStr
     * @return bool
     */
    public static function end(string $str, string $subStr)
    {
        return str_ends_with($str, $subStr);
    }

    /**
     * 字符串是否包含中文
     * @param string $str
     * @return bool
     */
    public static function checkChr(string $str)
    {
        return preg_match('/[\x{4e00}-\x{9fa5}]/u',$str);
    }

    /**
     * 字符串转小写
     *
     * @param  string $value
     * @return string
     */
    public static function lower(string $value): string
    {
        return mb_strtolower($value, 'UTF-8');
    }

    /**
     * 字符串转大写
     *
     * @param  string $value
     * @return string
     */
    public static function upper(string $value): string
    {
        return mb_strtoupper($value, 'UTF-8');
    }

    /**
     * 获取指定长度的随机字母数字组合的字符串
     *
     * @param  int $length
     * @param  int $type
     * @return string
     */
    public static function random(int $length = 6, int $type = null): string
    {
        switch ($type) {
            case 0:
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                break;
            case 1:
                $chars = str_repeat('0123456789', 3);
                break;
            case 2:
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 3:
                $chars = 'abcdefghijklmnopqrstuvwxyz';
                break;
            default:
                $chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
                break;
        }
        if ($length > 10) {
            $chars = $type == 1 ? str_repeat($chars, $length) : str_repeat($chars, 5);
        }
        $chars = str_shuffle($chars);
        $str = substr($chars, 0, $length);
        return $str;
    }

    /**
     * 生成UUID
     *
     * @return string
     */
    public static function uuid()
    {
        $chars = md5(uniqid(mt_rand(), true));
        return substr($chars, 0, 8) . '-'
            . substr($chars, 8, 4) . '-'
            . substr($chars, 12, 4) . '-'
            . substr($chars, 16, 4) . '-'
            . substr($chars, 20, 12);
    }
}