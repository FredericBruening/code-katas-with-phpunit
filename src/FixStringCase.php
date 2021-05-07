<?php


namespace App;


class FixStringCase {
    public static function solve(string $string) {
        preg_match_all('/[A-Z]/', $string, $matches);

        return count($matches[0]) > abs(strlen($string) / 2) ? strtoupper($string) : strtolower($string);
    }
}