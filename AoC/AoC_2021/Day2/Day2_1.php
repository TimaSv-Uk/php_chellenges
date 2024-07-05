<?php

namespace AoC_2021\Day2;

use Illuminate\Support\Collection;

class Day2_1
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data = new Collection(file($this->file_name));
  }
  public function solution(): int
  {
    $horizontal = 0;
    $deapth = 0;
    foreach ($this->data as $move) {
      [$direction, $steps] = explode(" ", $move);
      $steps = intval($steps);
      match ($direction) {
        "forward" => $horizontal += $steps,
        "down" => $deapth += $steps,
        "up" => $deapth -= $steps
      };
    }
    return $horizontal * $deapth;
  }
}
