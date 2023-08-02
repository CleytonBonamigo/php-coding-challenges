<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $arrayS = array_count_values(str_split($s));
        $arrayT = array_count_values(str_split($t));

        return $arrayS == $arrayT;
    }
}

$solution = new Solution();

$s = 'anagram';
$t = 'nagaram';
$expectedOutput = true;

if($solution->isAnagram($s, $t) === $expectedOutput){
    echo 'Test 1: Ok'.PHP_EOL;
}else{
    echo 'Test 2: Failed'.PHP_EOL;
}

$s = 'rat';
$t = 'car';
$expectedOutput = false;

if($solution->isAnagram($s, $t) === $expectedOutput){
    echo 'Test 2: Ok'.PHP_EOL;
}else{
    echo 'Test 2: Failed'.PHP_EOL;
}