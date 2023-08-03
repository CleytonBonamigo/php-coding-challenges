<?php

require_once 'helpers.php';

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
checkResult($solution->isAnagram($s, $t) === $expectedOutput, 1);

$s = 'rat';
$t = 'car';
$expectedOutput = false;
checkResult($solution->isAnagram($s, $t) === $expectedOutput, 2);