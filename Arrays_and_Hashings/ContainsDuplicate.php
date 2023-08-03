<?php

require_once 'helpers.php';

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $map = [];

        foreach($nums as $num){
            if(isset($map[$num])){
                return true;
            }

            $map[$num] = $num;
        }

        return false;
    }
}

$solution = new Solution();

$nums = [1,2,3,1];
$expectedOutput = true;
checkResult($solution->containsDuplicate($nums), $expectedOutput, 1);

$nums = [1,2,3,4];
$expectedOutput = false;
checkResult($solution->containsDuplicate($nums), $expectedOutput, 2);

$nums = [1,1,1,3,3,4,3,2,4,2];
$expectedOutput = true;
checkResult($solution->containsDuplicate($nums), $expectedOutput, 3);