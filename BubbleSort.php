<?php
include 'SortTestHelper.php';

use App\SortTestHelper as Helper;

function BubbleSort($arr, $n)
{
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i+1; $j < $n; $j++) {
            if($arr[$j]<$arr[$i]){
                Helper::swap($arr[$i],$arr[$j]);
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
    print_r(BubbleSort($array, 10));exit;*/

    $RunTime = Helper::SortTime("Bubble Sort", 'BubbleSort', $arr, $n);
    unset($arr);//释放内存
    print_r($RunTime);
}

main();