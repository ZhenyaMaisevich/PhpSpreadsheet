<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StandardNormal;
use PHPUnit\Framework\TestCase;

class NormSInvTest extends TestCase
{
    /**
     * @dataProvider providerNORMSINV
     *
     * @param mixed $expectedResult
     * @param mixed $testValue
     */
    public function testNORMSINV($expectedResult, $testValue): void
    {
        $result = StandardNormal::inverse($testValue);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-12);
    }

    public function providerNORMSINV(): array
    {
        return require 'tests/data/Calculation/Statistical/NORMSINV.php';
    }

    /**
     * @dataProvider providerNormSInvArray
     */
    public function testNormSInvArray(array $expectedResult, string $probabilities): void
    {
        $calculation = Calculation::getInstance();

        $formula = "=NORMSINV({$probabilities})";
        $result = $calculation->_calculateFormulaValue($formula);
        self::assertEqualsWithDelta($expectedResult, $result, 1.0e-14);
    }

    public function providerNormSInvArray(): array
    {
        return [
            'row/column vectors' => [
                [
                    ['#NUM!', -1.959963986120195],
                    [-0.3853204662702544, 0.6744897502234225],
                ],
                '{-0.75, 0.025; 0.35, 0.75}',
            ],
        ];
    }
}
