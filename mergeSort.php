<?php
include 'SortTestHelper.php';

use App\SortTestHelper as Helper;

//将arr[l..mid]和arr[mid...r]两部分进行合并
function __merge($arr, $l, $mid, $r)
{
    $aux = array();
    for ($i = $l; $i <= $r; $i++) {
        $aux[$i - $l] = $arr[$i];
    }
    $i = $l;
    $j = $mid + 1;
    for ($k = $l; $k <= $r; $k++) {
        if ($i > $mid) {
            $arr[$k] = $aux[$j - $l];
            $j++;
        } else if ($j > $r) {
            $arr[$k] = $aux[$i - $l];
            $i++;
        } else if ($aux[$i - $l] < $aux[$j - $l]) {
            $arr[$k] = $aux[$i - $l];
            $i++;
        } else {
            $arr[$k] = $aux[$j - $l];
            $j++;
        }
    }
    unset($aux);
    return $arr;
}


function __mergeSort($arr, $l, $r)
{
    if ($l >= $r) {
        return '';
    }
    $mid = floor(($l + $r) / 2);
    $rs = __mergeSort($arr, $l, $mid);
    if (!empty($rs)) {
        $arr = $rs;
    }
    $rs = __mergeSort($arr, $mid + 1, $r);
    if (!empty($rs)) {
        $arr = $rs;
    }
    $result = __merge($arr, $l, $mid, $r);
    return $result;
}

function MergeSort($arr, $n)
{
    return __mergeSort($arr, 0, $n - 1);
}

function main()
{
    $array = [8, 1, 7, 5, 6, 4, 3, 2];
    print_r(MergeSort($array, 8));
    exit;
    $n = 10000;
    $arr = Helper::generateRandomArray($n, 0, $n);
    $RunTime = Helper::SortTime("Merge Sort", 'MergeSort', $arr, $n);
    unset($arr);//释放内存
    print_r($RunTime);
}

main();