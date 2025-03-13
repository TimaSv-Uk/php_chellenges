<?php


namespace AoC_2020\Day2;

require __DIR__ . "/../../vendor/autoload.php";

use Illuminate\Support\Collection;


class Day2_2
{
  public Collection $data;

  public function __construct(public string $file_name)
  {
    $this->data =  new Collection(file($this->file_name));
  }
  public function solution(): int
  {
    $valid_password_polices = 0;
    for ($i = 0; $i < $this->data->count(); $i++) {
      if ($this->is_valid_password($this->data[$i])) {
        $valid_password_polices++;
      }
    }
    return $valid_password_polices;
  }
  public function is_valid_password(string $password_police)
  {

    [$rules, $password] = explode(":", $password_police);
    $password = trim($password);
    [$nuber_of_min_max_ocurunces, $letter] = explode(" ", $rules);
    [$min, $max] = explode("-", $nuber_of_min_max_ocurunces);
    $min = (int)$min - 1;
    $max = (int)$max - 1;
    $contains_min = false;
    $contains_max = false;
    if (isset($password[$min]) && $password[$min] === $letter) {

      $contains_min = true;
    }

    if (isset($password[$max]) && $password[$max] === $letter) {
      $contains_max = true;
    }
    return ($contains_min || $contains_max) && $contains_min !== $contains_max;
  }
}

print_r((new Day2_2("data.txt"))->solution());
