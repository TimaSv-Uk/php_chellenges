<?php

namespace AoC_2021\Day4;

use Illuminate\Support\Collection;
use AoC_2021\Day4\Bingo_board;
class Day4_1
{
  public Collection $data;
  public Collection $bingo_numbers;

  /**
   * @var Collection<Bingo_board>
   */
  public Collection $bingo_boards;

  public function __construct(public string $file_name)
  {
    $data = explode("\n\n", file_get_contents($this->file_name));
    $this->data = new Collection($data);
    $this->bingo_numbers = new Collection(explode(",", $this->data->shift()));
    $this->bingo_boards = $this->data->map(fn ($string_board) => new Bingo_board($string_board));
  }
  public function solution(): int
  {
    foreach ($this->bingo_numbers as $bingo_number) {
      foreach ($this->bingo_boards as $bingo_board) {
        $bingo_board->mark_number($bingo_number);
        if ($bingo_board->marked_row_or_col()) {
          return $bingo_number * $bingo_board->sum_of_unmarked();
        }
      }
    }
    return 0;
  }
}

