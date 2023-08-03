<?php

function checkResult($return, $expectedOutput, int $testNumber){
    if($return === $expectedOutput){
        echo "Test {$testNumber}: Ok".PHP_EOL;
    }else{
        echo "Test {$testNumber}: Failed".PHP_EOL;
    }
}