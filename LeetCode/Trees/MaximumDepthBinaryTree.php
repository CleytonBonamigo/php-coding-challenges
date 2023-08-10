<?php

require_once "TreeNode.php";
require_once "TreeHelper.php";
require_once "helpers.php";

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if($root === null){
            return 0;
        }

        return $this->iteractiveDFS($root);
    }

    function DFS($root){
        return 1 + max($this->maxDepth($root->left), $this->maxDepth($root->right));
    }

    function BFS($root){
        $levels = 0;
        $queue = new SplQueue();
        $queue->enqueue($root);

        while(!$queue->isEmpty()){
            $count = $queue->count();
            for ($i = 0; $i < $count; $i++){
                $node = $queue->dequeue();
                if($node->left){
                    $queue->enqueue($node->left);
                }
                if($node->right){
                    $queue->enqueue($node->right);
                }
            }

            $levels++;
        }

        return $levels;
    }

    function iteractiveDFS($root){
        $stack = [[$root, 1]];
        $result = 1;
        while(!empty($stack)){
            $last = end($stack);
            $node = $last[0];
            $depth = $last[1];
            array_pop($stack);

            if($node){
                $result = max($result, $depth);
                array_push($stack, [$node->left, $depth + 1]);
                array_push($stack, [$node->right, $depth + 1]);
            }
        }

        return $result;
    }
}

$solution = new Solution();

$root = [3,9,20,null,null,15,7];
$expectedOutput = 3;
checkResult($solution->maxDepth(arrayToTree($root)) === $expectedOutput, 1);

$root = [1,null,2];
$expectedOutput = 2;
checkResult($solution->maxDepth(arrayToTree($root)) === $expectedOutput, 2);

$root = null;
$expectedOutput = 0;
checkResult($solution->maxDepth(arrayToTree($root)) === $expectedOutput, 3);
