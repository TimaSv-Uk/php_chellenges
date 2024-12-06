<?php

namespace AoC_2024\Day5;

use Illuminate\Support\Collection;
use PHPUnit\Event\Runtime\PHP;

class Day5
{

  public Collection $updates;
  public array $rule_map;

  public function __construct(public string $file_name,)
  {
    [$rules, $updates] =  explode(PHP_EOL . PHP_EOL, trim(file_get_contents($this->file_name)));
    $this->updates = collect(explode(PHP_EOL, $updates))->map(fn($update) => explode(",", trim($update)));
    $rules = collect(explode(PHP_EOL, $rules))->map(fn($rule) => explode("|", trim($rule)));

    $rule_map = [];
    foreach ($rules as $rule) {
      [$before, $after] = $rule;
      $rule_map[$before][] = $after;
    }
    $this->rule_map = $rule_map;
  }

  public function solution_part1()
  {

    /*dump($this->is_update_correct($this->updates[0], $rule_map));*/
    $sum_of_middle_items_in_correct_updates = 0;
    foreach ($this->updates as $update) {


      if ($this->is_update_correct($update, $this->rule_map)) {
        $middle_index = floor(count($update) / 2);
        $sum_of_middle_items_in_correct_updates += $update[$middle_index];
        dump($update[$middle_index]);
      }
    }
    return $sum_of_middle_items_in_correct_updates;
  }

  public function is_update_correct(array $update, array $rule_map): bool
  {
    for ($i = count($update) - 1; $i > 0; $i--) {
      $current_item = $update[$i];
      $rules_for_currect = $rule_map[$current_item] ?? null;
      /*dump([$current_item, array_slice($update, 0, $i), $rules_for_currect]);*/
      if ($rules_for_currect === null) {
        continue;
      }
      if (array_intersect(array_slice($update, 0, $i), $rules_for_currect)) {
        return false;
      }
    }
    return true;
  }
  public function solution_part2()
  {

    /*dump($this->fix_order_update($this->updates[3], $this->rule_map));*/
    $sum_of_middle_items_in_correct_updates = 0;
    foreach ($this->updates as $update) {


      if (!$this->is_update_correct($update, $this->rule_map)) {
        $middle_index = floor(count($update) / 2);
        $fixed_update = $this->fix_order_update($update, $this->rule_map);
        while (!$this->is_update_correct($fixed_update, $this->rule_map)) {
          $this->is_update_correct($fixed_update, $this->rule_map);
        }
        $sum_of_middle_items_in_correct_updates += $fixed_update[$middle_index];
        dump($this->is_update_correct($fixed_update, $this->rule_map));
      }
    }
    return $sum_of_middle_items_in_correct_updates;
  }
  public function fix_order_update(array $update, array $rule_map): array
  {
    for ($i = count($update) - 1; $i > 0; $i--) {
      $current_item = $update[$i];
      $rules_for_currect = $rule_map[$current_item] ?? null;

      if ($rules_for_currect === null) {
        continue;
      }
      $all_items_before_current = array_slice($update, 0, $i);
      for ($j = count($all_items_before_current) - 1; $j >= 0; $j--) {
        if (in_array($all_items_before_current[$j], $rules_for_currect)) {

          /*dump([$update[$i] ,$update[$j]]);*/
          $temp = $update[$i];
          $update[$i] = $update[$j];
          $update[$j] = $temp;
        }
      }
      /*dump([$current_item, array_slice($update, 0, $i), $rules_for_currect]);*/
    }
    return $update;
  }
}
