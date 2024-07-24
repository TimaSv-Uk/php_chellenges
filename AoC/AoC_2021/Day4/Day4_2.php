<?php

namespace AoC_2021\Day4;

use Illuminate\Support\Collection;
use AoC_2021\Day4\Bingo_board;

class Day4_2
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
    $all_boards_first_win  = [];
    $all_boards_that_claimed_win  = [];
    foreach ($this->bingo_numbers as $bingo_number) {
      foreach ($this->bingo_boards as $key => $bingo_board) {
        if(in_array($key,$all_boards_that_claimed_win)){
            continue;
        }
        $bingo_board->mark_number($bingo_number);
        if ($bingo_board->marked_row_or_col()) {
          $win = $bingo_number * $bingo_board->sum_of_unmarked();
          $all_boards_first_win[] = $win;
          $all_boards_that_claimed_win[] = $key;
        }
      }
    }
    return array_pop($all_boards_first_win);
  }
}
