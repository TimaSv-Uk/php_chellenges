<?php

namespace AoC_2024\Day1;

use Illuminate\Support\Collection;

class Day1_2
{
  public Collection $data;
  public Collection $left_side;
  public Collection $right_side;

  public function __construct(public string $file_name)
  {
    $this->data =  new Collection(file($this->file_name));

    $this->right_side = new Collection();
    $this->left_side = new Collection();
    foreach ($this->data as $pair) {
      $split_sides =  explode("   ", trim($pair));

      $this->left_side[] = $split_sides[0];
      $this->right_side[] = $split_sides[1];
    }
    $this->left_side = $this->left_side->sort()->values();
    $this->right_side = $this->right_side->sort()->values();
  }
  public function solution(): int
  {
    $sum_of_sorted_direrences = 0;
    for ($i = 0; $i < $this->left_side->count(); $i++) {

      $sum_of_sorted_direrences += abs(
        $this->left_side[$i] *
          $this->right_side->where(fn($val) => $this->left_side[$i] === $val)->count()
      );
    }
    return $sum_of_sorted_direrences;
  }
}
