<?php

#### Task 1
#
#Create a function `maskify` to mask digits of a credit card number with `#`.
#
#**Requirements:**
#
#- Do not mask the first digit and the last four digits
#- Do not mask non-digit chars
#- Do not mask if the input is less than 6
#- Return '' when input is empty

function maskify(string $credit_card_number): string
{
  if ($credit_card_number === "") {
    return "";
  }

  if (strlen($credit_card_number) < 6) {
    return $credit_card_number;
  }

  for ($i = 1; $i < strlen($credit_card_number) - 4; $i++) {
    if (is_numeric($credit_card_number[$i])) {
      $credit_card_number[$i] = "#";
    }
  }

  return $credit_card_number;
}
