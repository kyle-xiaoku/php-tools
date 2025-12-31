<?php

namespace Kyledong\PhpTools;

class Time
{
    /**
     * 获取时间戳（毫秒）
     *
     * @return string
     */
    public static function getCurrentMilis()
    {
        $timeInfo = explode(' ', microtime());
        return sprintf('%d%03d', $timeInfo[1], $timeInfo[0] * 1000);
    }

    /**
     * 获取当前时间
     * @param string $format
     * @return string
     */
    public static function getTime(string $format = 'Y-m-d H:i:s')
    {
        return date($format);
    }

    /**
     * 时间戳转化为具体时间
     * @param string $timestamp
     * @param string $format
     * @return string
     */
    public static function convertTimestampToTime(string $timestamp,string $format = 'Y-m-d H:i:s')
    {
        return date($format,$timestamp);
    }

    /**
     * 过去的日期
     * @param string $day
     * @param string $format
     * @return string
     */
    public static function previous($day, string $format = 'Y-m-d H:i:s')
    {
        return date($format, strtotime("-{$day} day"));
    }

    /**
     * 未来的日期
     * @param string $format
     * @param string $day
     * @return string
     */
    public static function future($day, string $format = 'Y-m-d H:i:s')
    {
        return date($format, strtotime("+{$day} day"));
    }
}