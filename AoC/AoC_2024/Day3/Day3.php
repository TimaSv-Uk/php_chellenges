<?php

namespace AoC_2024\Day3;

use Illuminate\Support\Collection;

class Day3
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data =  new Collection(file($this->file_name));
  }
  public function solution_part1(): int
  {
    $mults = $this->filter_correct_mults($this->data->implode(""));
    $get_mult_results = collect($mults)->map(function ($str) {
      $trimd = trim($str, "mul()");
      $nums = explode(",", $trimd);
      return $nums[0] * $nums[1];
    });
    /*dump($get_mult_results->take(4));*/
    return $get_mult_results->sum();
  }

  public function solution_part2(): int
  {
    $mults = $this->filter_correct_mults_with_do_dont($this->data->implode(""));
    $sum = 0;
    $stop_command_active = false;
    foreach ($mults as $command) {
      if ($command === "don't()") {
        $stop_command_active = true;
        continue;
      }
      if ($command === "do()") {
        $stop_command_active = false;
        continue;
      }
      if (!$stop_command_active) {

        $trimd = trim($command, "mul()");
        $nums = explode(",", $trimd);
        $sum +=   $nums[0] * $nums[1];
      }
    }
    /*dump($mults);*/
    return $sum;
  }
  private  function filter_correct_mults(string $corrupted_memory): array
  {

    preg_match_all("/mul\(\d+,\d+\)/", $corrupted_memory, $matches);

    return $matches[0];
  }

  private  function filter_correct_mults_with_do_dont(string $corrupted_memory): array
  {

    preg_match_all("/mul\(\d+,\d+\)|don't\(\)|do\(\)/", $corrupted_memory, $matches);

    return $matches[0];
  }
}
