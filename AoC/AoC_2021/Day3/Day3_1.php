<?php

namespace AoC_2021\Day3;

use Illuminate\Support\Collection;

class Day3_1
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data = new Collection(file($this->file_name));
  }
  public function solution(): int
  {

    $gamma_rate = $this->get_binary();
    $epsilon_rate = (new Collection(str_split($gamma_rate)))->map(fn ($dig) => $dig === "1" ? "0" : "1")->implode("");
    return bindec($gamma_rate) * bindec($epsilon_rate);
  }

  public function get_binary(): string
  {
    $col_len = count($this->data) - 1;
    $row_len = strlen(trim($this->data[0]));

    $common_bit_in_col = "";

    for ($i = 0; $i < $row_len; $i++) {
      $ones = 0;
      $zeros = 0;
      for ($j = 0; $j < $col_len; $j++) {

        if ($this->data[$j][$i] === "1") {
          $ones++;
        } else {
          $zeros++;
        }
      }
      if ($ones > $zeros) {
        $common_bit_in_col .= "1";
      } else {
        $common_bit_in_col .= "0";
      }
    }

    return $common_bit_in_col;
  }
}
