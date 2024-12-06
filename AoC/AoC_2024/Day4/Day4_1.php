<?php

namespace AoC_2024\Day4_1;

use Illuminate\Support\Collection;

class Day4_1
{
  public Collection $data;
  public string $word_to_find = "XMAS";

  public function __construct(public string $file_name)
  {
    $this->data = (new Collection(file($this->file_name)))->map(fn($row) => str_split(trim($row)));
  }
  public function solution_part1()
  {
    $found_intances = $this->search_vertical($this->data) + $this->search_horizontal($this->data) + $this->search_diagonaly($this->data);
    return $found_intances;
  }

  public function search_diagonaly($split_text): int
  {

    $diagonal_horisontal_data =  $this->to_diagonal_horisontal_array($split_text);
    $diagonal_horisontal_data_reverse =  $this->to_diagonal_horizontal_array_reverse($split_text);

    $found_horisontal = $this->search_horizontal($diagonal_horisontal_data) + $this->search_horizontal($diagonal_horisontal_data_reverse);
    return $found_horisontal;
  }
  public function search_horizontal($split_text): int
  {
    $found_intances = 0;
    foreach ($split_text as $horizontal_line) {
      $line_instances = collect($horizontal_line)
        ->sliding(4)
        ->map(fn($letters) => $letters->implode(""))
        ->filter(fn($word) => $word === "XMAS" | $word === "SAMX");
      $found_intances += $line_instances->count();
    }
    return $found_intances;
  }


  public function search_vertical($split_text): int
  {
    $reverce_row_col = collect($split_text)->map(fn($val, $key) => collect($split_text)->pluck($key));
    $found_vertical = $this->search_horizontal($reverce_row_col);
    return $found_vertical;
  }

  public function to_diagonal_horizontal_array_reverse($split_text)
  {
    $diagonal_array = [];
    $rows = count($split_text);
    $cols = count($split_text[0]);

    // Traverse upper diagonals (from last column to the first)
    for ($d = $cols - 1; $d >= 0; $d--) {
      $i = 0; // Start row
      $j = $d; // Start column
      $diag = [];
      while ($i < $rows && $j < $cols) {
        $diag[] = $split_text[$i][$j];
        $i++;
        $j++;
      }
      $diagonal_array[] = $diag;
    }

    // Traverse lower diagonals (from second row to the last)
    for ($d = 1; $d < $rows; $d++) {
      $i = $d; // Start row
      $j = 0; // Start column
      $diag = [];
      while ($i < $rows && $j < $cols) {
        $diag[] = $split_text[$i][$j];
        $i++;
        $j++;
      }
      $diagonal_array[] = $diag;
    }

    return $diagonal_array;
  }
  public function to_diagonal_horisontal_array($split_text)
  {

    $diagonal_array = [];
    $rows = count($split_text);
    $cols = count($split_text[0]);
    for ($d = 0; $d < $cols; $d++) {
      $i = 0;  // Start row
      $j = $d; // Start column
      $diag = [];
      while ($i < $rows && $j >= 0) {
        $diag[] = $split_text[$i][$j];
        $i++;
        $j--;
      }
      $diagonal_array[] = $diag;
    }
    for ($d = 1; $d < $rows; $d++) {
      $i = $d; // Start row
      $j = $cols - 1; // Start column
      $diag = [];
      while ($i < $rows && $j >= 0) {
        $diag[] = $split_text[$i][$j];
        $i++;
        $j--;
      }
      $diagonal_array[] = $diag;
    }
    return $diagonal_array;
  }
}
