<?php

require_once "TreeNode.php";

function arrayToTree($array) {
    // Validate input
    if (empty($array)) {
        return null;
    }

    $root = new TreeNode($array[0]);
    $queue = new SplQueue();
    $queue->enqueue($root);
    $i = 1;

    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();

        // Check if we have more elements to process
        if ($i < count($array)) {
            // Process the node's left child.
            if ($array[$i] !== null) {
                $node->left = new TreeNode($array[$i]);
                $queue->enqueue($node->left);
            }
            $i++;
        }

        // Check again if we have more elements to process
        if ($i < count($array)) {
            // Process the node's right child.
            if ($array[$i] !== null) {
                $node->right = new TreeNode($array[$i]);
                $queue->enqueue($node->right);
            }
            $i++;
        }
    }

    return $root;
}