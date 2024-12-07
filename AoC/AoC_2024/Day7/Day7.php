<?php

namespace AoC_2024\Day7;

use Illuminate\Support\Collection;
use PHPUnit\Event\Runtime\PHP;

class Day7
{

  public Collection $data;

  public function __construct(public string $file_name,)
  {
    $this->data = collect(file($this->file_name));
  }

  public function solution_part1()
  {

    $total_calibration_result = $this->data->map(
      function ($line) {
        [$left, $right] = explode(": ", trim($line));
        $right = array_map("intval", explode(" ", $right));
        return [$left, $right];
      }
    )->filter(fn($line) => $this->can_be_solved($line[0], $line[1]))
      ->sum(fn($calibration) => $calibration[0]);
    return $total_calibration_result;
    /*$item = 2;*/
    /*dump($this->data[$item]);*/
    /*dump($this->can_be_solved($this->data[$item][0], $this->data[$item][1]));*/
  }
  public function solution_part2()
  {
    $total_calibration_result = $this->data->map(
      function ($line) {
        [$left, $right] = explode(": ", trim($line));
        $right = array_map("intval", explode(" ", $right));
        return [$left, $right];
      }
    )->filter(fn($line) => $this->can_be_solved_part2($line[0], $line[1]))
      ->sum(fn($calibration) => $calibration[0]);
    return $total_calibration_result;
  }
  public function can_be_solved(int $result, array $nums_to_add_or_mult): bool
  {
    $all_posible_wariants = [];
    if (count($nums_to_add_or_mult) - 1 === 0) {

      if ($nums_to_add_or_mult[0] === $result) {
        return true;
      }
      return false;
    }

    $i = 0;
    $all_posible_wariants[$i]["+"] = $nums_to_add_or_mult[$i] + $nums_to_add_or_mult[$i + 1];
    $all_posible_wariants[$i]["*"] = $nums_to_add_or_mult[$i] * $nums_to_add_or_mult[$i + 1];
    $all_posible_wariants[$i]["expected_result"] = $result;
    $all_posible_wariants[$i]["rest"] = array_slice($nums_to_add_or_mult, $i);

    $array_if_mult = array_slice($nums_to_add_or_mult, $i + 2);
    array_unshift($array_if_mult, $all_posible_wariants[$i]["*"]);

    $array_if_add = array_slice($nums_to_add_or_mult, $i + 2);
    array_unshift($array_if_add, $all_posible_wariants[$i]["+"]);

    return ($this->can_be_solved($result, $array_if_add) || $this->can_be_solved($result, $array_if_mult));
  }

  public function can_be_solved_part2(int $result, array $nums_to_add_or_mult): bool
  {
    $all_posible_wariants = [];
    if (count($nums_to_add_or_mult) - 1 === 0) {

      if ($nums_to_add_or_mult[0] === $result) {
        return true;
      }
      return false;
    }

    $i = 0;
    $all_posible_wariants[$i]["+"] = $nums_to_add_or_mult[$i] + $nums_to_add_or_mult[$i + 1];
    $all_posible_wariants[$i]["*"] = $nums_to_add_or_mult[$i] * $nums_to_add_or_mult[$i + 1];
    $all_posible_wariants[$i]["||"] = $nums_to_add_or_mult[$i] . $nums_to_add_or_mult[$i + 1];
    $all_posible_wariants[$i]["expected_result"] = $result;

    $array_if_mult = array_slice($nums_to_add_or_mult, $i + 2);
    array_unshift($array_if_mult, $all_posible_wariants[$i]["*"]);

    $array_if_add = array_slice($nums_to_add_or_mult, $i + 2);
    array_unshift($array_if_add, $all_posible_wariants[$i]["+"]);


    $array_if_combyne_digits = array_slice($nums_to_add_or_mult, $i + 2);
    array_unshift($array_if_combyne_digits, intval($all_posible_wariants[$i]["||"]));

    return ($this->can_be_solved_part2($result, $array_if_add)
      || $this->can_be_solved_part2($result, $array_if_mult)
      || $this->can_be_solved_part2($result, $array_if_combyne_digits));
  }
}
