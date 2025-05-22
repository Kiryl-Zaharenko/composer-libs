<?php

namespace Zaharenko\CalcHelper;
class Helper
{
    public static function formatPrice($input, $decimals = 0): string
    {
        if ($decimals > 0 && is_int($decimals)) {
            return number_format($input, $decimals, '.', ' ');
        }

        if (strlen($input) == 0) {
            return '';
        }

        if (intval($input) < 10000) {
            return str_replace('.', ',', (string)$input);
        }

        $input = floatval(str_replace(array(' ', ','), array('', '.'), $input));
        $result = number_format($input, (floor($input) == $input ? 0 : 2), '.', ' ');
        return str_replace('.', ',', $result);
    }

    public static function numberFormat($number): string
    {
        return number_format($number, 0, '.', ' ');
    }

    public static function formatTitle(string $text): string
    {
        return Helper . phpmb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }

    public static function roundStep($step): float|int
    {
        if ($step < 1000) {
            return ceil($step / 100) * 100; // Round to nearest 100 for small steps
        } elseif ($step < 10000) {
            return ceil($step / 500) * 500; // Round to nearest 500
        } else {
            return ceil($step / 1000) * 1000; // Round to nearest 1000
        }
    }
}