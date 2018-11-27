<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/23
 * Time: 14:24
 */

namespace App;
class SortTestHelper
{
    //生成对应数量随机数的辅助函数
    static function generateRandomArray($n, $rangL, $rangR)
    {
        assert($rangL <= $rangR);

        $arr = [];
        srand(time());
        for ($i = 0; $i < $n; $i++) {
            //确保生成的随机数在范围内
            $arr[$i] = rand() % ($rangR - $rangL + 1) + $rangL;
        }
        return $arr;
    }

    //生成近乎有序的随机数数组函数
    static function generateNearlyOrderedArray($n, $swapTimes)
    {
        $arr = [];
        for ($i = 0; $i < $n; $i++)
            $arr[$i] = $i;

        srand(time());
        for ($i = 0; $i < $swapTimes; $i++) {
            //确保生成的随机数在范围内
            $posx = rand() % $n;
            $posy = rand() % $n;
            self::swap($arr[$posx], $arr[$posy]);
        }
        return $arr;
    }

    //计算算法运行时间的函数
    static function SortTime($name, $function, $arr, $n)
    {
        $startTime = microtime(true);
        $arr = $function($arr, $n);
        $endTime = microtime(true);
        assert(self::isSorted($arr, $n));
        return $name . ':' . ($endTime - $startTime) . 's';
    }

    //检验我们的算法是否对数组排序成功
    static function isSorted($array, $n)
    {
        for ($i = 0; $i < $n - 1; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                return false;
            }
        }
        return true;
    }

    static function swap(&$arrA, &$arrB)
    {
        $temp = $arrA;
        $arrA = $arrB;
        $arrB = $temp;
    }
}