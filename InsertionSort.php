<?php
include 'SortTestHelper.php';

use App\SortTestHelper as Helper;

function InsertionSort($arr, $n)
{
    for ($i = 1; $i < $n; $i++) {
        //当前值的备份
        $e = $arr[$i];
        //$j保存$e最终应该插入的位置;
        for ($j = $i; $j > 0 && $arr[$j - 1] > $e; $j--) {
            //如果$j-1>$e,就代表前一个元素比后面的元素大，当前$e这个位置不应该是$e的归属
            $arr[$j] = $arr[$j-1];
        }
        //以$i=1为例，到这里$j=0
        $arr[$j] = $e;
    }
    return $arr;
}

function main()
{
    $n = 10000;
    $arr = Helper::generateRandomArray($n, 0, $n);
//    $arr2 = Helper::generateNearlyOrderedArray($n,100);
/*    $array = [8, 1, 7, 5, 6, 4, 3, 9, 0, 2];
    print_r(InsertionSort($array, 10));exit;*/

//    $RunTime = Helper::SortTime("Insertion Sort", 'InsertionSort', $arr, $n);
    $RunTime = Helper::SortTime("Insertion Sort", 'InsertionSort', $arr, $n);

    unset($arr);//释放内存
    print_r($RunTime);
}

main();