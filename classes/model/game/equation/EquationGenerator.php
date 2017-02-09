<?php
class EquationGenerator{

    private $nTerms = 0;
    private $mode = 0;

    public function __construct($nTerms = 0, $mode = 0)
    {
        $this->nTerms = $nTerms >= 2 ? $nTerms : rand(5, 10);
        $this->mode = $mode < 0 || $mode > 4 ? 4 : $mode;
    }


    public function generate(){

        $lastEquation = null;

        for ($i = 0; $i < 10; $i++) {

            $nTerms = $this->nTerms;

            $leftSide = array();
            $rightSide = array();

            $leftSide[] = Term::generate(self::getHeuristic());
            $rightSide[] = Term::generate(self::getHeuristic());

            $nTerms -= 2;

            while ($nTerms > 0){
                if (self::getRandBool()) $leftSide[] = Term::generate(self::getHeuristic());
                else $rightSide[] = Term::generate(self::getHeuristic());

                $nTerms--;
            }

            $equation = new Equation($leftSide, $rightSide);

            if ($equation->solution() == false || ($this->mode <= 2 && self::is_decimal($equation->solution()))){
                $i--;
                continue;
            }

            if ($lastEquation == null || ($equation->solution() > $lastEquation->solution()))
                $lastEquation = $equation;

        }


        return $lastEquation;
    }

    private function getHeuristic()
    {
        $heuristic = 0;
        switch ($this->mode) {
            case 0:
                $heuristic = rand(0, 5);
                break;
            case 1:
                $heuristic = rand(25, 50);
                break;
            case 2:
                $heuristic = rand(50, 100);
                break;
            case 3:
                $heuristic = rand(75, 200);
                break;
            case 4:
                $heuristic = rand(100, 400);
                break;
        }
        return $heuristic;
    }


    private function is_decimal( $val )
    {
        return is_numeric( $val ) && floor( $val ) != $val;
    }

    private function getRandBool()
    {
        return rand(0, 1) == 1;
    }
}