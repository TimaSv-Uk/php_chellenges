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
class Solution
{

	/**
	 * @param TreeNode $root
	 * @return Boolean
	 */
	function isSymmetric($root)
	{

		return $this->mirror_tree($root->left, $root->right);
	}
	function mirror_tree(?TreeNode $left, ?TreeNode $right)
	{
		if ($left === null && $right === null) {
			return true;
		}
		if ($left === null || $right === null) {
			return false;
		}
		return $left->val === $right->val &&
			$this->mirror_tree($left->left, $right->right) &&
			$this->mirror_tree($left->right, $right->left);
	}
}




$p = new TreeNode(2, new TreeNode(3), new TreeNode(4));
$q = new TreeNode(2, new TreeNode(4), new TreeNode(3));
$same = new TreeNode(1, $p, $q);
$not_same = new TreeNode(1, new TreeNode(2, null, new TreeNode(3)), new TreeNode(2, null, new TreeNode(3)));

var_dump((new Solution())->isSymmetric($not_same));
var_dump((new Solution())->isSymmetric($same));
// var_dump((new Solution())->traverce_tree_left($foo));
// var_dump((new Solution())->isSymmetric($bar));
