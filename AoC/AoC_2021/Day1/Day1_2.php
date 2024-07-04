<?php

namespace AoC_2021\Day1;

use Illuminate\Support\Collection;

class Day1_2
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data =  new Collection(file($this->file_name));
  }
  public function solution(): int
  {
    $increace_from_last_one = 0;

    for ($i = 1; $i < $this->data->count() - 2; $i++) {
      $old_window = $this->data[$i - 1] + $this->data[$i] + $this->data[$i + 1];
      $current_window = $this->data[$i] + $this->data[$i + 1] + $this->data[$i + 2];
      if ($current_window > $old_window) {
        $increace_from_last_one++;
      }
    }
    return $increace_from_last_one;
  }
}
