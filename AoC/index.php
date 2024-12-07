<?php

require __DIR__ . "/vendor/autoload.php";

use AoC_2024\Day7\Day7;

$day_number = 7;
$example_data = false;

$data_file_name = $example_data ? 'data0.txt' : 'data.txt';
$file = __DIR__ . "/AoC_2024" . "/Day{$day_number}/{$data_file_name}";

$d = new Day7($file);
dump("answer: {$d->solution_part1()}");
