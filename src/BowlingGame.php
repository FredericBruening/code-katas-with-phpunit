<?php


namespace App;


class BowlingGame {

    /*
     * The number of frames in a game
     * */
    const FRAMES_PER_GAME = 10;

    /*
     * All roles for the game
     * */
    protected $rolls = [];

    /**
     * Knock down pins
     *
     * @param int $pins
     */
    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    /**
     * Calculate the final score
     *
     * @return int|mixed
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll);
                $score += $this->pinCount($roll + 1) + $this->pinCount($roll + 2);

                $roll += 1;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->pinCount($roll + 2);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * Returns true if the frame is a strike
     *
     * @param int $roll
     * @return bool
     */
    public function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

    /**
     * Returns true if the frame is a spare
     *
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * Calculate the score for the frame
     *
     * @param int $roll
     * @return mixed
     */
    public function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->rolls[$roll + 1];
    }

    /**
     * Get the pin count for the roll
     *
     * @param int $roll
     * @return int
     */
    public function pinCount(int $roll) : int
    {
       return $this->rolls[$roll];
    }
}