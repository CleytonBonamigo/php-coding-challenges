<?php

require "helpers.php";

/**
 * Imagine a tournament where teams are marked with letters from a to z.
 * Our task is to find the team with just one win in the entire tournament and return its index (0-indexed).
 * If there are multiple teams with just one win, we return the one with the earliest win.
 * However, if there isn’t a single team with just one win, we return -1.
 *
 * For instance, consider the following examples:
 * Example 1:
 * input $s = “acabsecs”;
 * output: 3
 *
 * Example 2:
 * input $s = “finse”;
 * output: 0
 *
 * Example 3:
 * input $s = “aabb”;
 * output: -1
 *
 * @param $s
 * @return int|mixed
 */

function findTeamWithOneWin($s) {
    $wins = [];
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++) {
        $team = $s[$i];
        if (isset($wins[$team])) {
            if ($wins[$team]['count'] == 1) {
                unset($wins[$team]);
            } else {
                $wins[$team]['count']++;
            }
        } else {
            $wins[$team] = ['count' => 1, 'index' => $i];
        }
    }

    $minIndex = $len;
    $minTeam = null;
    foreach ($wins as $team => $info) {
        if ($info['count'] == 1 && $info['index'] < $minIndex) {
            $minIndex = $info['index'];
            $minTeam = $team;
        }
    }

    return ($minTeam !== null) ? $minIndex : -1;
}

$teams = 'acabsecs';
$expectedOutput = 3;
checkResult(findTeamWithOneWin($teams) === $expectedOutput, 1);

$teams = 'finse';
$expectedOutput = 0;
checkResult(findTeamWithOneWin($teams) === $expectedOutput, 2);

$teams = 'aabb';
$expectedOutput = -1;
checkResult(findTeamWithOneWin($teams) === $expectedOutput, 3);