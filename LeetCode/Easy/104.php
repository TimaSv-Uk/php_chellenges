<?php


namespace LeetCode\Easy;

use Illuminate\Support\Collection;
use PhpParser\Node\Stmt\If_;

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
class Solution
{

	/**
	 * @param TreeNode $root
	 * @return int
	 */
	function maxDepth($root)
	{
		if ($root === null) {
			return 0;
		}
		$left = $this->maxDepth($root->left) + 1;
		$right = $this->maxDepth($root->right) + 1;
		return ($left > $right) ? $left : $right;
	}


	// function get_tree_depth(TreeNode $root){
	// 	
	// 	
	// }
}



$p = new TreeNode(1, new TreeNode(1), new TreeNode(2));
$q = new TreeNode(4, new TreeNode(1), new TreeNode(2));
$m = new TreeNode(5, new TreeNode(10), null);
$foo = new TreeNode(1, new TreeNode(3), $m);

var_dump((new Solution)->maxDepth($foo));
