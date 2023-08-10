<?php

require "helpers.php";

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