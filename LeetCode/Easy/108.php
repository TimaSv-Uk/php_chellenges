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
class Solution
{

	/**
	 * @param Integer[] $nums
	 * @return TreeNode
	 */
	function sortedArrayToBST($nums)
	{

		if ($nums == null) {
			return new TreeNode();
		}

		$middle_index = floor(count($nums) / 2);

		$left_side = null;
		$right_side = null;

		if ($middle_index - 1 >= 0) {

			$left_side = $this->sortedArrayToBST(array_slice($nums, 0, $middle_index));
		};
		if ($middle_index + 1 < count($nums)) {

			$right_side = $this->sortedArrayToBST(array_slice($nums, $middle_index + 1));
		};



		return new TreeNode($nums[$middle_index], $left_side, $right_side);;
	}
}
var_dump((new Solution())->sortedArrayToBST([-1, 0, 1, 2]));
