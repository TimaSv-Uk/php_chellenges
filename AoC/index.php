<?php

require __DIR__ . "/vendor/autoload.php";

use AoC_2024\Day1\Day1_2;

$file = __DIR__ . "/AoC_2024" . "/Day1/data.txt";

$d = new Day1_2($file);

echo $d->solution();

