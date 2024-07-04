<?php

#### Task 2
#
#Create a function `number_to_ordinal` to create an ordinal number for a given input.
#Ordinal numbers in English have something like `st`, `nd`, `rd`, etc.
#
#**Requirements:**
#
#- Apply for number 1 to 1001... if that works any given number will do ;-)

function number_to_ordinal(int $num): string
{

  $str_num = strval($num);

  if (0 === $num) {
    return '0';
  }

  if (in_array($num, [11, 12, 13])) {

    return  $str_num . "th";
  }

  return match (substr($str_num, -1)) {
    "1" => $str_num . "st",
    "2" => $str_num . "nd",
    "3" => $str_num . "rd",
    default => $str_num . "th",
  };
}
