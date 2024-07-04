<?php


#### Task 3
#
#Create a calculator for [Reverse Polish Notation](https://en.wikipedia.org/wiki/Reverse_Polish_notation).
#Write a `calculate` function that accepts an input and returns the result of the operation.
#
#**Requirements:**
#
#- Support the mathematical operations for `+`, `-`, `*` and `/`
#- Check for invalid syntax, like `2 3+`. There is a space missing.
#- Return 0 (integer) when nothing is entered
#- Return the numeric value when no operand is given, like `1 2 3.5` return `3.5`


function calculate(string $num_num_operand): int|float|bool
{
  $equesion =  explode(" ", $num_num_operand);
  if (!is_numeric($equesion[0]) || !is_numeric($equesion[1])) {
    return 0;
  }

  if (is_numeric($equesion[2])) {
    return $equesion[2];
  }

  return match ($equesion[2]) {
    "+" => intval($equesion[0]) + intval($equesion[1]),
    "-" => intval($equesion[0]) - intval($equesion[1]),
    "*" => intval($equesion[0]) * intval($equesion[1]),
    "/" => intval($equesion[0]) / intval($equesion[1]),
    default => false,
  };
}
