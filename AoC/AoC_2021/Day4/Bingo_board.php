<?php

namespace AoC_2021\Day4;
use Illuminate\Support\Collection;

class Bingo_board
{
  /**
   * @var Collection<array<int>>
   */
  public Collection $grid;

  public function __construct(string $string_board)
  {
    $string_board = trim($string_board);
    $string_board = str_replace("  ", " ", $string_board);

    $this->grid = (new Collection(explode("\n", $string_board)))
      ->map(function ($row) {
        return array_map('intval', explode(" ", trim($row)));
      });
  }
  public function mark_number(int $bingo_number): void
  {
    for ($i = 0; count($this->grid) > $i; $i++) {
      $row = $this->grid[$i];
      $row = array_map(fn ($cell) => $cell === $bingo_number ? "" : $cell, $row);
      $this->grid[$i] = $row;
    }
  }
  public function marked_row_or_col(): bool
  {
    $cols_with_mark = array_fill(0, count($this->grid[0]), true);
    for ($i = 0; count($this->grid) > $i; $i++) {
      $row = $this->grid[$i];
      $marked_in_row = 0;
      for ($j = 0; count($row) > $j; $j++) {
        if ($row[$j] === "") {
          $marked_in_row++;
        } else if (in_array($j, $cols_with_mark)) {
          $cols_with_mark[$j] = false;
        }
      }
      if ($marked_in_row === count($row)) {
        return true;
      }
    }
    foreach ($cols_with_mark as $col_marked) {
      if ($col_marked) {
        return true;
      }
    }

    return false;
  }
  public function sum_of_unmarked(): int
  {
    $sum = 0;
    foreach ($this->grid as $row) {
      foreach ($row as $cell) {
        if (is_numeric($cell)) {
          $sum += $cell;
        }
      }
    }
    return $sum;
  }
}
