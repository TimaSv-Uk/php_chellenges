<?php

#### Task 4
#
#Given you have an array of numbers, you move inside the array by the value of the current element.
#Write a function `jump_out_of_array` that outputs
#
#- the amount of jumps until you jump out of the array
#- `-1` when you reach the end of the array but do not jump out
#
#**Requirements:**
#
#- Array size is indefinite
#- Array elements are integers, positive and negative
#
#**Example:**
#
#Given an array of `A[2, 3, -1, 1, 6, 4]`.
#
#![](./docs/t4/task4.png)
#
#- Jump 1: `A[0]` + `2` = `A[2]`
#- Jump 2: `A[2]` + `(-1)` = `A[1]`
#- Jump 3: `A[1]` + `3` = `A[4]`
#- Jump 4: `A[4]` + `6` = out of range
#
#So the result is `4`, you need `4` jumps to jump out of the array.

function jump_out_of_array(array $arr): int
{
  $i = $arr[0];
  $jumps = 1;
  while (count($arr) > $i && $i > 0) {
    if ($arr[$i] === 0 || count($arr) < $i + 1) {
      return -1;
    }
    $i += $arr[$i];
    $jumps++;
  };
  return $jumps;
}

echo jump_out_of_array([0, 1, 2, 1, 1, 1, 0]);
