<?php

namespace AoC_2024\Day2;

use Illuminate\Support\Collection;

class Day2_1
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data =  new Collection(file($this->file_name));
  }
  public function solution(): int
  {
    $report_count = 0;
    foreach ($this->data as $report) {
      $split_reposr = array_map("intval",explode(" ", trim($report)));
      
      if ($this->increasing_array($split_reposr)) {
        $report_count++;
      } else if ($this->decreasing_array($split_reposr)) {
        $report_count++;
      }
    }
    return $report_count;
  }
  public function increasing_array(array $array)
  {
    for ($i = 1; $i < count($array); $i++) {
      $increasing_by =    $array[$i] - $array[$i - 1];
      if (!($increasing_by >= 1 && $increasing_by <= 3)) {
        return false;
      }
    }
    return true;
  }

  public function decreasing_array(array $array)
  {
    for ($i = 1; $i < count($array); $i++) {

      $decreasing_by =  $array[$i - 1] - $array[$i];
      /*dump([$array,$decreasing_by]);*/
      if (!($decreasing_by >= 1 && $decreasing_by <= 3)) {
        return false;
      }
    }
    return true;
  }

}
