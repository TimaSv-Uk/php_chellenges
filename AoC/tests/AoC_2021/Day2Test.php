<?php

namespace Tests\AoC\AoC_2021;

use PHPUnit\Framework\TestCase;
use AoC_2021\Day2\Day2_1;
use AoC_2021\Day2\Day2_2;

final class Day2Test extends TestCase
{
  public function test_part1(): void
  {
    $example = new Day2_1(__DIR__ . "/../../AoC_2021/Day2/data0.txt");
    $solution = new Day2_1(__DIR__ . "/../../AoC_2021/Day2/data.txt");

    $this->assertSame(150, $example->solution());
    $this->assertSame(1524750, $solution->solution());
  }

  public function test_part2(): void
  {
    $example = new Day2_2(__DIR__ . "/../../AoC_2021/Day2/data0.txt");
    $solution = new Day2_2(__DIR__ . "/../../AoC_2021/Day2/data.txt");

    $this->assertSame(900, $example->solution());
    $this->assertSame(1592426537, $solution->solution());
  }

}
