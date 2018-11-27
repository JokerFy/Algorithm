<?php
include 'SortTestHelper.php';

use App\SortTestHelper as Helper;

function selection($arr, $n)
{
    for ($gap = floor($n / 2); $gap > 0; $gap = floor($gap / 2)) {
        for ($i = $gap; $i < $n; $i++) {
            $e = $arr[$i];
            $j = $i;
            if ($arr[$j] < $arr[$j - $gap]) {
                while ($j - $gap >= 0 && $arr[$j - $gap] > $e) {
                    //移动法
                    $arr[$j] = $arr[$j - $gap];
                    $j -= $gap;
                }
                $arr[$j] = $e;
            }
        }
    }
    return $arr;
}

function main()
{
    $n = 10;
    $array = [8, 1, 7, 5, 6, 4, 3, 9, 0, 2];
    print_r(selection($array, $n));
}

main();