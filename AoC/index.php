<?php

require __DIR__ . "/vendor/autoload.php";

use AoC_2024\Day4\Day4;

$file = __DIR__ . "/AoC_2024" . "/Day4/data0.txt";

$d = new Day4($file);

dump("answer: {$d->solution_part2()}");
