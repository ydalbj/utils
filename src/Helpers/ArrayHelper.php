<?php

namespace Ydalbj\Utils\Helpers;

class ArrayHelper
{
    /**
     * 将二维数组的某一字段作为键值转换为关联数组
     */
    public static function keyBy(array $data, string $field)
    {
        $converted = [];
        foreach ($data as $k => $v) {
            $converted[$v[$field]] = $v;
        }

        return $converted;
    }

    /**
     * 按指定列的值的顺序，对二维索引数组排序(不能对二维关联数组排序，因为会重置键值，最后返回索引数组)
     * @param array $data 二维索引数组
     * @param string $field 指定列名
     * @param array $values 指定列的值(如果指定的值不在$data中，或指定值不全会丢失数据)
     * @return array $data
     */
    public static function sortArrayByFieldValues(
        array $data,
        string $field,
        array $values
    ) {
        $data = static::keyBy($data, $field);

        $sorted = [];
        foreach ($values as $v) {
            if (!isset($data[$v])) {
                continue;
            }
            $sorted[] = $data[$v];
        }

        return $sorted;
    }
}
