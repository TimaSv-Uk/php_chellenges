<?php

require __DIR__ . "/vendor/autoload.php";

use AoC_2020\Day1\Day1_1;

$day_number = 1;
$example_data = true;

$data_file_name = $example_data ? 'data0.txt' : 'data.txt';
$file = __DIR__ . "/AoC_2020" . "/Day{$day_number}/{$data_file_name}";

$d = new Day1_1($file);
dump("answer: {$d->solution()}");
