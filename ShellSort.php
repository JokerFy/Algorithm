<?php
include 'SortTestHelper.php';

use App\SortTestHelper as Helper;

//移动法 10000数据 Shell Sort:0.085999965667725s
function ShellSort($arr, $n)
{
    //计算增量
    for ($gap = floor($n / 2); $gap > 0; $gap = floor($gap / 2)) {
        //根据增量进行分组，进行直接插入排序
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
    $n = 10000;
    $arr = Helper::generateRandomArray($n, 0, $n);
/*    $array = [8, 1, 7, 5, 6, 4, 3, 9, 0, 2];
    print_r(ShellSort($array, 10));
    exit;*/

    $RunTime = Helper::SortTime("Shell Sort", 'ShellSort', $arr, $n);
    unset($arr);//释放内存
    print_r($RunTime);
}

main();