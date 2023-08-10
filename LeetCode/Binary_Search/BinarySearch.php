<?php

require_once 'helpers.php';

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $mid = $left + floor(($right - $left) / 2);
            if ($nums[$mid] == $target)
                return (int) $mid; //Do a parse, cause it was returning a float number
            elseif ($nums[$mid] < $target)
                $left = $mid + 1;
            else
                $right = $mid - 1;
        }
        return -1;
    }
}

$solution = new Solution();

$nums = [-1,0,3,5,9,12];
$target = 9;
$expectedOutput = 4;
checkResult($solution->search($nums, $target) === $expectedOutput, 1);

$nums = [-1,0,3,5,9,12];
$target = 2;
$expectedOutput = -1;
checkResult($solution->search($nums, $target) === $expectedOutput, 2);