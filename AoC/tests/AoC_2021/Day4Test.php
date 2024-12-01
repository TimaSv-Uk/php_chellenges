<?php

namespace Tests\AoC\AoC_2021;

use PHPUnit\Framework\TestCase;
use AoC_2021\Day4\Day4_1;
use AoC_2021\Day4\Day4_2;

final class Day4Test extends TestCase
{
  
  public function test_part1(): void
  {
    $example = new Day4_1(__DIR__ . "/../../AoC_2021/Day4/data0.txt");
    $solution = new Day4_1(__DIR__ . "/../../AoC_2021/Day4/data.txt");
    $this->assertSame(4512, $example->solution());
    $this->assertSame(71708, $solution->solution());
  }

  public function test_part2(): void
  {
    $example = new Day4_2(__DIR__ . "/../../AoC_2021/Day4/data0.txt");
    $solution = new Day4_2(__DIR__ . "/../../AoC_2021/Day4/data.txt");

    $this->assertSame(1924, $example->solution());
    $this->assertSame(34726, $solution->solution());
  }
}
