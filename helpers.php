<?php

function checkResult(bool $check, int $testNumber){
    if($check){
        echo "Test {$testNumber}: Ok".PHP_EOL;
    }else{
        echo "Test {$testNumber}: Failed".PHP_EOL;
    }
}