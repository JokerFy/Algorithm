<?php
include 'SortTestHelper.php';

use App\SortTestHelper as Helper;

function partition($arr,$l,$r)
{
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$i]) {
                $left[] = $arr[$j];
            } elseif ($arr[$j] > $arr[$i]) {
                $right[] = $arr[$j];
            } else {
                $middle[] = $arr[$j];
            }
        }
    }
    return '';
}

//移动法 10000数据 Shell Sort:0.085999965667725s
function QuickSort($arr, $n)
{
    $l = 0;
    $r = $n - 1;
    if ($l >= $r) {
        return false;
    }
    $p = partition($arr,$l,$r);
    return $arr;
}

function main()
{
    $n = 10000;
    $arr = Helper::generateRandomArray($n, 0, $n);
    /*    $array = [8, 1, 7, 5, 6, 4, 3, 9, 0, 2];
        print_r(ShellSort($array, 10));
        exit;*/

    $RunTime = Helper::SortTime("Quick Sort", 'QuickSort', $arr, $n);
    unset($arr);//释放内存
    print_r($RunTime);
}

main();