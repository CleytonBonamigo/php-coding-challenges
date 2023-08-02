<?php

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
if($solution->containsDuplicate($nums) === $expectedOutput){
    echo 'Test 1: Ok'.PHP_EOL;
}else{
    echo 'Test 1: Failed'.PHP_EOL;
}

$nums = [1,2,3,4];
$expectedOutput = false;
if($solution->containsDuplicate($nums) === $expectedOutput){
    echo 'Test 2: Ok'.PHP_EOL;
}else{
    echo 'Test 2: Failed'.PHP_EOL;
}

$nums = [1,1,1,3,3,4,3,2,4,2];
$expectedOutput = true;
if($solution->containsDuplicate($nums) === $expectedOutput){
    echo 'Test 3: Ok'.PHP_EOL;
}else{
    echo 'Test 3: Failed'.PHP_EOL;
}