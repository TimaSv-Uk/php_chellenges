<?php


namespace LeetCode\Easy;

use Illuminate\Support\Collection;

//NOTE: <!-- 108. Convert Sorted Array to Binary Search Tree -->

/**
 * Definition for a binary tree node.
 *
 */
class TreeNode
{
	public $val = null;
	public $left = null;
	public $right = null;
	function __construct($val = 0, $left = null, $right = null)
	{
		$this->val = $val;
		$this->left = $left;
		$this->right = $right;
	}
}

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
/**
 * @param TreeNode $root
 * @return Integer[]
 */
function inorderTraversal($root)
{

	$stack = [];
	$output = [];
	$current = $root;

	while ($stack || $current) {
		while ($current) {
			$stack[] = $current;
			$current = $current->left;
		};

		$current  = array_pop($stack);
		$output[] = $current->val;
		$current = $current->right;
	}


	return $output;
}



$p = new TreeNode(1, new TreeNode(1), new TreeNode(2));
$q = new TreeNode(1, new TreeNode(1), new TreeNode(2));
$foo = new TreeNode(1, new TreeNode(3), new TreeNode(2));

var_dump(inorderTraversal($foo));
