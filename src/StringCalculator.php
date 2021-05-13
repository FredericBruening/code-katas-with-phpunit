<?php


namespace App;

use Exception;

class StringCalculator {

    const MAX_NUMBER_ALLOWED = 1000;

    protected $delimiter = ",|\R";

    public function add(string $numbers)
    {
        $this->rejectNegativeNumbers($numbers = $this->parseString($numbers));

        return array_sum(
            $this->filterGreaterThanMaxNumber($numbers)
        );
    }

    /**
     * @param string $numbers
     * @return array
     */
    protected function parseString(string $numbers): array
    {
        if (preg_match("/\/\/(.)\R/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }

    /**
     * @param $numbers
     * @throws Exception
     */
    public function rejectNegativeNumbers(array $numbers)
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are not allowed');
            }
        }

        return $this;
    }

    /**
     * @param array $numbers
     * @return array
     */
    protected function filterGreaterThanMaxNumber(array $numbers): array
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });
    }
}