<?php


namespace AoC_2020\Day1;

require __DIR__ . "/../../vendor/autoload.php";

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
    for ($i = 0; $i < $this->data->count(); $i++) {

      for ($j = 0; $j < $this->data->count(); $j++) {
        for ($k = 0; $k < $this->data->count(); $k++) {
          if ($this->data[$i] + $this->data[$j] + $this->data[$k] === 2020) {
            return  $this->data[$i] * $this->data[$j] * $this->data[$k];
          }
        }
      }
    }
    return 0;
  }
}

print_r((new Day1_2("data0.txt"))->solution());
