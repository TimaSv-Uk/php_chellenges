<?php

namespace Tests\AoC\AoC_2021;

use PHPUnit\Framework\TestCase;
use AoC_2021\Day1\Day1_1;
use AoC_2021\Day1\Day1_2;

final class Day1Test extends TestCase
{
  public function test_part1(): void
  {
    $example =  new Day1_1(__DIR__ . "/../../AoC_2021/Day1/data0.txt");
    $solution =  new Day1_1(__DIR__ . "/../../AoC_2021/Day1/data.txt");

    $this->assertSame(7, $example->solution());
    $this->assertSame(1502, $solution->solution());
  }

  public function test_part2(): void
  {
    $example =  new Day1_2(__DIR__ . "/../../AoC_2021/Day1/data0.txt");
    $solution =  new Day1_2(__DIR__ . "/../../AoC_2021/Day1/data.txt");

    $this->assertSame(5, $example->solution());
    $this->assertSame(1538, $solution->solution());
  }

}
