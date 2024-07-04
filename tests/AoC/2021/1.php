<?php


namespace Tests;

use PHPUnit\Framework\TestCase;
use AoC\AoC_2021;

final class T1Test extends TestCase
{
  public function part1()
  {
    $data = file(__DIR__ . "/../../AoC/data/2021/1.txt");
    $this->assertSame(2000, count($data));
  }
}
