<?php

namespace Kyledong\PhpTools;

class Arr
{
    /**
     * 二维数组排序
     * @param array $data
     * @param string $field
     * @param string $sort
     * @return array
     */
    public static function multiSort(array $data, string $field, string $sort = 'desc')
    {
        $fields = array_column($data, $field);
        $sort = $sort === 'desc' ? SORT_DESC : SORT_ASC;
        array_multisort($fields, $sort, $data);
        return $data;
    }

    /**
     * 截取数组
     * @param string $str
     * @param int $start
     * @param int|null $length
     * @return array
     */
    public static function slice(array $data, int $start, int $length = null)
    {
        return array_slice($data,$start,$length);
    }
}