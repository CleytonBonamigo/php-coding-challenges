<?php

require_once "TreeNode.php";
require_once "helper.php";

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

$root1 = [3,9,20,null,null,15,7];
$root2 = [1,null,2];
$root3 = null;

$solution = new Solution();

if($solution->maxDepth(arrayToTree($root1)) === 3){
    echo 'Test 1: Ok'.PHP_EOL;
}else{
    echo 'Test 1: Failed'.PHP_EOL;
}

if($solution->maxDepth(arrayToTree($root2)) === 2){
    echo 'Test 2: Ok'.PHP_EOL;
}else{
    echo 'Test 2: Failed'.PHP_EOL;
}

if($solution->maxDepth(arrayToTree($root3)) === 0){
    echo 'Test 3: Ok'.PHP_EOL;
}else{
    echo 'Test 3: Failed'.PHP_EOL;
}
