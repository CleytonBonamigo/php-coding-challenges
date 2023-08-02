<?php

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
if($solution->twoSum($input, $target) === $expectedOutput){
    echo 'Test 1: Ok'.PHP_EOL;
}else{
    echo 'Test 1: Failed'.PHP_EOL;
}

$input = [3,2,4];
$target = 6;
$expectedOutput = [1,2];
if($solution->twoSum($input, $target) === $expectedOutput){
    echo 'Test 2: Ok'.PHP_EOL;
}else{
    echo 'Test 2: Failed'.PHP_EOL;
}

$input = [3,3];
$target = 6;
$expectedOutput = [0,1];
if($solution->twoSum($input, $target) === $expectedOutput){
    echo 'Test 3: Ok'.PHP_EOL;
}else{
    echo 'Test 3: Failed'.PHP_EOL;
}