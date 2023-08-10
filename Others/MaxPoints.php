<?php

require "helpers.php";

/**
 * The problem involves a sequence of x’s and o’s written on a piece of paper.
 * The goal is to cut this paper into two pieces such that the number of points we get is maximized.
 * Points are computed by adding the number of x’s on the left half of the paper and the number of o’s on the right half of the paper.
 * The task is to determine the maximum number of points we can get.
 *
 * Consider the following examples:
 * Example1:
 * Input: s = “xoooxo”
 * Output: 5
 *
 * Example 2:
 * Input: s = “xxoo”
 * Output: 4
 *
 * Example 3:
 * Input: s = “ooxxox”
 * Output: 3
 *
 * @param $s
 * @return int
 */
function maxPoints($s) {
    $len = strlen($s);
    $countXLeft = $countORight = 0;

    for ($i = $len - 1; $i >= 0; $i--) {
        if ($s[$i] == 'o') {
            $countORight++;
        }
    }

    $maxPoints = $countORight;

    for ($i = 0; $i < $len - 1; $i++) {
        if ($s[$i] == 'x') {
            $countXLeft++;
        } else {
            $countORight--;
        }

        $points = $countXLeft + $countORight;

        if ($points > $maxPoints) {
            $maxPoints = $points;
        }
    }

    return $maxPoints;
}

$s = 'xoooxo';
$expectedOutput = 5;
checkResult(maxPoints($s) === $expectedOutput, 1);

$s = 'xxoo';
$expectedOutput = 4;
checkResult(maxPoints($s) === $expectedOutput, 2);

$s = 'ooxxox';
$expectedOutput = 3;
checkResult(maxPoints($s) === $expectedOutput, 3);