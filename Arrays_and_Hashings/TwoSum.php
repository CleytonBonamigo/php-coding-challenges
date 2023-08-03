<?php

require_once 'helpers.php';

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];
        foreach($nums as $index => $value){
            $diff = $target - $value;
            if(isset($map[$diff])){
                return [$map[$diff], $index];
            }

            $map[$value] = $index;
        }

        return;
    }
}

$solution = new Solution();

$input = [2,7,11,15];
$target = 9;
$expectedOutput = [0,1];
checkResult($solution->twoSum($input, $target) === $expectedOutput, 1);

$input = [3,2,4];
$target = 6;
$expectedOutput = [1,2];
checkResult($solution->twoSum($input, $target) === $expectedOutput, 2);

$input = [3,3];
$target = 6;
$expectedOutput = [0,1];
checkResult($solution->twoSum($input, $target) === $expectedOutput, 3);