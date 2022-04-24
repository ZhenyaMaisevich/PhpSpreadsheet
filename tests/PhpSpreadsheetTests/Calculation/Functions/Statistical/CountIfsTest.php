<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Conditional;
use PHPUnit\Framework\TestCase;

class CountIfsTest extends TestCase
{
    protected function setUp(): void
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerCOUNTIFS
     *
     * @param mixed $expectedResult
     */
    public function testCOUNTIFS($expectedResult, ...$args): void
    {
        $result = Conditional::COUNTIFS(...$args);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-12);
    }

    public function providerCOUNTIFS(): array
    {
        return require 'tests/data/Calculation/Statistical/COUNTIFS.php';
    }
}
