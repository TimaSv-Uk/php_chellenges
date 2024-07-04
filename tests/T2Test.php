<?php


namespace Tests;

use PHPUnit\Framework\TestCase;

final class T2Test extends TestCase
{
  public function test1st()
  {
    $this->assertSame('1st', number_to_ordinal(1));
  }

  public function test2nd()
  {
    $this->assertSame('2nd', number_to_ordinal(2));
  }

  public function test3rd()
  {
    $this->assertSame('3rd', number_to_ordinal(3));
  }

  public function test4th()
  {
    $this->assertSame('4th', number_to_ordinal(4));
  }

  public function test5th()
  {
    $this->assertsame('1001st', number_to_ordinal(1001));
  }

  public function test6th()
  {
    $this->assertSame('1000th', number_to_ordinal(1000));
  }

  public function test7th()
  {
    $this->assertSame('23rd', number_to_ordinal(23));
  }

  public function test8th()
  {
    $this->assertSame('21st', number_to_ordinal(21));
  }

  public function test9th()
  {
    $this->assertSame('11th', number_to_ordinal(11));
  }
}
