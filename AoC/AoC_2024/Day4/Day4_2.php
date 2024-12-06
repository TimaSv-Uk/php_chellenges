<?php

namespace AoC_2024\Day4_2;

use Illuminate\Support\Collection;

class Day4_2
{
  public Collection $data;
  public string $word_to_find = "XMAS";

  public function __construct(public string $file_name)
  {
    $this->data = (new Collection(file($this->file_name)))->map(fn($row) => str_split(trim($row)));
  }

  public function solution_part2()
  {
    return 0 ;
  }


}
