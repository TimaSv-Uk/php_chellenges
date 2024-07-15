<?php

namespace Tests\AoC\AoC_2021;

use PHPUnit\Framework\TestCase;
use AoC_2021\Day3\Day3_1;
use AoC_2021\Day3\Day3_2;

final class Day3Test extends TestCase
{
  public function test_part1(): void
  {
    $example = new Day3_1(__DIR__ . "/../../AoC_2021/Day3/data0.txt");
    $solution = new Day3_1(__DIR__ . "/../../AoC_2021/Day3/data.txt");
    $this->assertSame(198, $example->solution());
    $this->assertSame(3813416, $solution->solution());
  }

  public function test_part2(): void
  {
    $example = new Day3_2(__DIR__ . "/../../AoC_2021/Day3/data0.txt");
    $solution = new Day3_2(__DIR__ . "/../../AoC_2021/Day3/data.txt");

    print_r($example->oxygen_generator_rating());
    $this->assertSame(230, $example->solution());
    $this->assertSame(2990784, $solution->solution());
  }
}
