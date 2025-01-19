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
/**
 * @param TreeNode $p
 * @param TreeNode $q
 * @return Boolean
 */
function isSameTree($p, $q)
{


	if (($p === null && $q === null)) {
		return true;
	}
	if ($p?->val !== $q?->val) {
		return false;
	}
	if (!isSameTree($p->left, $q->left)) {
		return false;
	};
	if (!isSameTree($p->right, $q->right)) {
		return false;
	};

	return true;
}



$p = new TreeNode(1, new TreeNode(1), new TreeNode(2));
$q = new TreeNode(1, new TreeNode(1), new TreeNode(2));
$foo = new TreeNode(1, new TreeNode(3), new TreeNode(2));

var_dump(isSameTree($p, $q));
var_dump(isSameTree($p, $foo));
