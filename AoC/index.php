<?php

require __DIR__ . "/vendor/autoload.php";

use AoC_2021\Day4\Day4_1;


$file = __DIR__ . "/AoC_2021" . "/Day4/data.txt";

$d = new Day4_1($file);

echo $d->solution();

