<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\Functions;

class Minimum
{
    /**
     * MIN.
     *
     * MIN returns the value of the element of the values passed that has the smallest value,
     *        with negative numbers considered smaller than positive numbers.
     *
     * Excel Function:
     *        MIN(value1[,value2[, ...]])
     *
     * @param mixed ...$args Data values
     *
     * @return float
     */
    public static function MIN(...$args)
    {
        $returnValue = null;

        // Loop through arguments
        $aArgs = Functions::flattenArray($args);
        foreach ($aArgs as $arg) {
            // Is it a numeric value?
            if ((is_numeric($arg)) && (!is_string($arg))) {
                if (($returnValue === null) || ($arg < $returnValue)) {
                    $returnValue = $arg;
                }
            }
        }

        if ($returnValue === null) {
            return 0;
        }

        return $returnValue;
    }

    /**
     * MINA.
     *
     * Returns the smallest value in a list of arguments, including numbers, text, and logical values
     *
     * Excel Function:
     *        MINA(value1[,value2[, ...]])
     *
     * @param mixed ...$args Data values
     *
     * @return float
     */
    public static function MINA(...$args)
    {
        $returnValue = null;

        // Loop through arguments
        $aArgs = Functions::flattenArray($args);
        foreach ($aArgs as $arg) {
            // Is it a numeric value?
            if ((is_numeric($arg)) || (is_bool($arg)) || ((is_string($arg) && ($arg != '')))) {
                if (is_bool($arg)) {
                    $arg = (int) $arg;
                } elseif (is_string($arg)) {
                    $arg = 0;
                }
                if (($returnValue === null) || ($arg < $returnValue)) {
                    $returnValue = $arg;
                }
            }
        }

        if ($returnValue === null) {
            return 0;
        }

        return $returnValue;
    }
}