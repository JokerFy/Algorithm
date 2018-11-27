<?php
include 'SortTestHelper.php';
use App\SortTestHelper as Helper;

function SelectionSort($arr,$n){
    for($i=0;$i<$n;$i++){
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        Helper::swap($arr[$minIndex], $arr[$i]);
    }
    return $arr;
}

function main()
{
    $n = 10000;
    $arr = Helper::generateRandomArray($n, 0, $n);
    $array = [8, 1, 7, 5, 6, 4, 3, 9, 0, 2];
    $RunTime = Helper::SortTime("Selection Sort", 'SelectionSort', $arr, $n);
    unset($arr);//释放内存
    print_r($RunTime);
}

main();