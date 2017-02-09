<?php

class Term
{

    private $isNatural;
    private $number;
    private $hasX;

    private $heuristic;

    public function __construct($number, $isNatural = true, $hasX = false)
    {
        $this->isNatural = $isNatural;
        $this->number = $number;
        $this->hasX = $hasX;

        $this->calculateHeuristic();
    }

    private function calculateHeuristic()
    {
        $this->heuristic = $this->number;

        $this->heuristic *= ($this->isNatural ? 1 : 1.5);

        $this->heuristic *= ($this->hasX ? 2 : 1);
    }

    public function isNatural()
    {
        return $this->isNatural;
    }

    public function number()
    {
        return $this->number;
    }

    public function hasX()
    {
        return $this->hasX;
    }

    public function heuristic()
    {
        return $this->heuristic;
    }

    public function toString()
    {
        return ($this->isNatural ? "+" : "-") . ($this->number == 1 && $this->hasX ? "" : $this->number) . ($this->hasX ? "x" : "");
    }

    public static function generate($minHeuristic = 0)
    {
        if ($minHeuristic == 0) return new Term(rand(1, 10), self::getRandBool(), self::getRandBool());

        $minHeuristic = $minHeuristic > 600 ? 600 : $minHeuristic;

        $lastTerm = new Term(rand(1, 200), self::getRandBool(), self::getRandBool());

        for ($i = 0; $i < 100; $i++) {
            $newTerm = new Term(rand(1, 200), self::getRandBool(), self::getRandBool());
            if (abs($newTerm->heuristic() - $minHeuristic) < abs($lastTerm->heuristic() - $minHeuristic))
                $lastTerm = $newTerm;
        }

        return $lastTerm;
    }

    private static function getRandBool()
    {
        return rand(0, 1) == 1;
    }

    public static function parseTerm($term)
    {
        $isNatural = false;
        $number = "";
        $hasX = false;

        for ($i = 0; $i < strlen($term); $i++) {
            $char = substr($term, $i, 1);

            if ($char == "+")
                $isNatural = true;

            if (self::isNumber($char))
                $number .= $char;

            if ($char == "x")
                $hasX = true;

        }

        return new Term(intval($number) == "0" ? 1 : intval($number), $isNatural, $hasX);
    }

    private static function isNumber($number)
    {
        return $number == "0" || intval($number) != 0;
    }

}