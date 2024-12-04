<?php

namespace AoC_2024\Day2;

use Illuminate\Support\Collection;

class Day2_2
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data =  new Collection(file($this->file_name));
  }

  public function is_safe(array $array): bool
  {

    $diff = collect($array)->sliding()->mapSpread(fn(int $a, int $b) => $a - $b);
    $all_increasing = $diff->every(fn($i) => $i > 0);
    $all_decreasing = $diff->every(fn($i) => $i < 0);
    $below_max = $diff->every(fn($i) => abs($i) <= 3);
    return ($all_increasing || $all_decreasing) && $below_max;
  }
  public function solution(): int
  {
    $report_count = 0;
    foreach ($this->data as $report) {
      $split_reposr = array_map("intval", explode(" ", trim($report)));

      if ($this->can_be_safe($split_reposr)) {
        $report_count++;
      }
    }
    return $report_count;
  }

  public function can_be_safe(array $report): bool
  {
    for ($i = 0; $i < count($report); $i++) {
      $copy = $report;
      unset($copy[$i]);
      if ($this->is_safe($copy)) {
        return true;
      }
    }

    return false;
  }
}
