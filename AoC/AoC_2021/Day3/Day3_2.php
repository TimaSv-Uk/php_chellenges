<?php

namespace AoC_2021\Day3;

use Illuminate\Support\Collection;

class Day3_2
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data = new Collection(file($this->file_name));
  }
  public function solution(): int
  {
    return bindec($this->oxygen_generator_rating()) * bindec($this->CO2_scrubber_rating());
  }

  public function oxygen_generator_rating(): string
  {

    $filter = $this->data;
    $row_len = strlen(trim($this->data[0]));

    for ($i = 0; $i < $row_len; $i++) {

      $ones = $filter->filter(fn ($dig) => $dig[$i] === "1");
      $zeros = $filter->filter(fn ($dig) => $dig[$i] === "0");

      if ($ones->count() >= $zeros->count()) {
        $filter = $ones;
      } else {
        $filter = $zeros;
      }
      print_r($filter);
      if (count($filter) === 1) {
        break;
      }
    }
    return $filter->first();
  }

  public function CO2_scrubber_rating(): string
  {

    $filter = $this->data;
    $row_len = strlen(trim($this->data[0]));

    for ($i = 0; $i < $row_len; $i++) {

      $ones = $filter->filter(fn ($dig) => $dig[$i] === "1");
      $zeros = $filter->filter(fn ($dig) => $dig[$i] === "0");

      if ($ones->count() < $zeros->count()) {
        $filter = $ones;
      } else {
        $filter = $zeros;
      }
      if (count($filter) === 1) {
        break;
      }
    }
    return $filter->first();
  }
}
