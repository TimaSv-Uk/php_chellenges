<?php

namespace LeetCode\Easy;

use function Symfony\Component\VarDumper\Dumper\esc;

/**
 * @param int $rowIndex
 * @return Integer[][]
 */
function getRow($rowIndex)
{
	if ($rowIndex === 0) {
		return [1];
	}
	// if ($rowIndex === 1) {
	// 	return [1, 1];
	// }
	$pascal_triangle_rows = [[1], [1, 1]];
	$current_row = [];

	for ($i = 2; $i   < $rowIndex + 1; $i++) {

		$previos_row = $pascal_triangle_rows[$i - 1];

		$current_row[] = 1;

		for ($j = 0; $j < count($previos_row) - 1; $j++) {

			$current_row[] = $previos_row[$j] + $previos_row[$j + 1];
		}

		$current_row[] = 1;

		$pascal_triangle_rows[] = $current_row;
		// print_r($pascal_triangle_rows);
		$current_row  = [];
	}
	return array_pop($pascal_triangle_rows);
}

function next_row(array $array)
{
	$new_array = [];
	for ($i = 0; $i < count($array) - 1; $i++) {

		$new_array[] = $array[$i] + $array[$i + 1];
	}
	$new_array;
	return $new_array;
};
// print_r(next_row([1, 3, 3, 1]));
// generate(5);
print_r(
	getRow(3)
);
