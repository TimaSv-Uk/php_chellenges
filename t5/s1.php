<?php

#### Task 5
#
#Find the k-complement pairs in an array of a given number. Write a function `k_complement` that that outputs the amount
#of pairs.
#
#**Requirements:**
#
#_Do not_ use nested loops to solve this problem, because of a time complexity of the loop solution.
// [Check this thread](https://stackoverflow.com/questions/11032015/how-to-find-time-complexity-of-an-algorithm) to see what time complexity of an algorithm means.
#
#**Example:**
#
#- `A[0]` + `A[8]` = `1` + `5` = `6`
#- `A[1]` + `A[6]` = `8` + `-2` = `6`
#- `a[4]` + `a[8]` = `1` + `5` = `6`
#- `a[8]` + `a[4]` = `5` + `1` = `6`
#- `A[5]` + `A[5]` = `3` + `3` = `6`
#- `A[5]` + `A[5]` = `3` + `3` = `6`
#- `A[6]` + `A[1]` = `-2` + `8` = `6`
#- `A[8]` + `A[0]` = `5` + `1` = `6`
#
#The result here is `7`.

function k_complement(int $k, array $arr): int
{
  $found = 0;
  for ($i = 0; $i < count($arr); $i++) {
    $needed_num = $k - $arr[$i];

    if (in_array($needed_num, array_slice($arr, $i))) {
      print_r([$i, $arr[$i], $needed_num]);
      $found++;
    }
  }
  return $found * 2;
}

