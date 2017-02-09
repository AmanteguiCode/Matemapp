<?php

class Equation{

    private $leftSide = array();
    private $rightSide = array();

    private $heuristic = 0;

    private $solution;

    public function __construct($leftSide = null, $rightSide = null)
    {
        $this->leftSide = $leftSide;
        $this->rightSide = $rightSide;

        $this->sumHeuristicOf($leftSide);
        $this->sumHeuristicOf($rightSide);

        $this->solve();
    }

    private function sumHeuristicOf(array $side)
    {
        for ($i = 0; $i < count($side); $i++) {
            $this->heuristic += $side[$i]->heuristic();
        }
    }


    public function leftSide()
    {
        return $this->leftSide;
    }

    public function rightSide()
    {
        return $this->rightSide;
    }

    public function terms(){
        return count($this->leftSide()) + count($this->rightSide());
    }
    
    public function heuristic()
    {
        return $this->heuristic;
    }

    public function solution()
    {
        return $this->solution;
    }

    private function solve()
    {

        $leftConstant = 0;
        $leftTerm = 0;
        $rightConstant = 0;
        $rightTerm = 0;

        $leftSide = 0;
        $rightSide = 0;

        for ($i = 0; $i < count($this->leftSide()); $i++){
            $term = $this->leftSide()[$i];
            if ($term->isNatural()){
                if ($term->hasX()) $leftTerm += $term->number();
                else $leftConstant += $term->number();
            }else{
                if ($term->hasX()) $leftTerm -= $term->number();
                else $leftConstant -= $term->number();
            }
        }

        for ($i = 0; $i < count($this->rightSide()); $i++){
            $term = $this->rightSide()[$i];
            if ($term->isNatural()){
                if ($term->hasX()) $rightTerm += $term->number();
                else $rightConstant += $term->number();
            }else{
                if ($term->hasX()) $rightTerm -= $term->number();
                else $rightConstant -= $term->number();
            }
        }

        if ($rightTerm == 0 && $leftTerm == 0) return false;
        if ($leftConstant == 0 && $rightConstant == 0) return false;
        if ($leftConstant == 0 && $leftTerm == 1 && $rightTerm == 0) return false;
        if ($rightConstant == 0 && $rightTerm == 1 && $leftTerm == 0) return false;

        $rightSide = $rightConstant + ($leftConstant * -1);
        $leftSide = $leftTerm + ($rightTerm * -1);

        $this->solution = round($rightSide / $leftSide, 4);
    }

    public function toString(){
        $equation = "=";

        for ($i = 0; $i < count($this->rightSide); $i++) {
            $equation .= $this->rightSide[$i]->toString();
        }

        $equation = $this->rightSide[0]->isNatural() ? "=" . substr($equation, 2) : $equation;


        for ($i = 0; $i < count($this->leftSide); $i++) {
            $equation = $this->leftSide[$i]->toString() . $equation;
        }

        $equation = $this->leftSide[count($this->leftSide) - 1]->isNatural() ? substr($equation, 1) : $equation;
        
        return $equation;
    }


    public static function parseEquation($equation){
        $buildingTerm = false;

        $leftSideString = array();
        $rightSideString = array();

        $terms = array();

        $term = '';

        for($i = 0; $i < strlen($equation); $i++){
            $char = substr($equation, $i, 1);

            if ($char == "=") {
                if (strlen($term) > 0)
                    $terms[] = $term;
                $term = '';
                $buildingTerm = false;
                $leftSideString = $terms;
                $terms = array();
                continue;
            }

            if (!$buildingTerm && self::isSymbol($char)) {
                $term .= $char;
                $buildingTerm = true;
                continue;
            }

            if (!$buildingTerm && self::isNumber($char)) {
                $term .= "+".$char;
                $buildingTerm = true;
                continue;
            }

            if (!$buildingTerm && self::isX($char)) {
                $term .= "+1".$char;
                $terms[] = $term;
                $term = '';
                continue;
            }

            if ($buildingTerm && self::isNumber($char)){
                $term .= $char;
                continue;
            }

            if ($buildingTerm && self::isX($char)){
                $term .= $char;
                $buildingTerm = false;
                $terms[] = $term;
                $term = '';
                continue;
            }

            if ($buildingTerm && self::isSymbol($char)){
                $buildingTerm = false;
                $terms[] = $term;
                $term = '';
                $i--;
                continue;
            }
        }

        if (strlen($term) > 0)
            $terms[] = $term;

        $rightSideString = $terms;

        $leftSideTerms = array();
        $rightSideTerms = array();

        $leftSideString = array_reverse($leftSideString);
        foreach ($leftSideString as $stringTerm){
            $leftSideTerms[] = Term::parseTerm($stringTerm);
        }
        foreach ($rightSideString as $stringTerm){
            $rightSideTerms[] = Term::parseTerm($stringTerm);
        }

        return new Equation($leftSideTerms, $rightSideTerms);

    }

    private static function isSymbol($symbol){
        return $symbol == "+" || $symbol == "-";
    }

    private static function isX($symbol){
        return $symbol == "x";
    }

    private static function isNumber($number){
        return $number == "0" || intval($number) != 0;
    }
    

    


}