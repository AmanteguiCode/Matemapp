<?php

abstract class Game
{
    protected $equation;

    protected $time;

    protected $mode;

    protected $experience = 0;

    public $solutions = [];
    protected $iterator;

    protected $isFinished = false;

    protected $avatar = null;

    public function __construct($equation, $mode, $isCooperative = false)
    {
        $this->equation = $equation;
        $this->mode = $mode;


        if (!$isCooperative) {
            for ($i = 0; $i < (($this->mode > 2 ? 3 : 2)); $i++) {
                $this->solutions[$i] = $this->buildFakeSolution();
                for ($j = 0; $j < $i; $j++) {
                    if ($this->solutions[$i] == $this->solutions[$j] || $this->solutions[$i] == $this->getRealSolution()){
                        $i--;
                        break;
                    }
                }
            }
        } else {
            for ($i = 0; $i < 4; $i++) {
                $this->solutions[$i] = $this->buildFakeSolution();
                for ($j = 0; $j < $i; $j++) {
                    if ($this->solutions[$i] == $this->solutions[$j] || $this->solutions[$i] == $this->getRealSolution()){
                        $i--;
                        break;
                    }
                }
            }
        }
    }

    public function resetIterator()
    {
        $this->iterator = rand(0, count($this->solutions) - 1);
    }

    public function UnlockedAvatarId()
    {
        return $this->avatar->id();
    }

    public function unlockAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public abstract function start();

    public abstract function finish();

    public abstract function calculateExp();


    private function buildFakeSolutionWithDecimals()
    {
        return rand(0, 1) == 0 ? $this->equation->solution() + rand(1, 20) + (rand(1, 9) / 10) + (rand(1, 9) / 100) + (rand(1, 9) / 1000) : $this->equation->solution() - rand(1, 20) - (rand(1, 9) / 10) - (rand(1, 9) / 100) - (rand(1, 9) / 1000);
    }

    private function buildFakeSolutionWithoutDecimals()
    {
        return rand(0, 1) == 0 ? $this->equation->solution() + rand(1, 20) : $this->equation->solution() - rand(1, 20);
    }

    private function buildFakeSolution()
    {
        return $this->mode > 2 ? $this->buildFakeSolutionWithDecimals() : $this->buildFakeSolutionWithoutDecimals();
    }

    public function getFakeSolution()
    {
        $this->increaseIterator();
        return $this->solutions[$this->iterator];
    }

    private function increaseIterator()
    {
        $this->iterator++;
        $this->iterator = $this->iterator % $this->nSolutions();
    }

    public function mode()
    {
        return $this->mode;
    }

    public function modeName()
    {
        switch ($this->mode) {
            case 0:
                return "Fácil";
            case 1:
                return "Normal";
            case 2:
                return "Media";
            case 3:
                return "Díficil";
            case 4:
                return "Muy difícil";
        }
        return "Desconocido";
    }

    public function nTerms()
    {
        return $this->equation()->terms();
    }

    public function time()
    {
        return $this->time;
    }

    public function equation()
    {
        return $this->equation;
    }

    public function isFinished()
    {
        return $this->isFinished;
    }

    public function getRealSolution()
    {
        return $this->equation->solution();
    }

    public function nSolutions()
    {
        return count($this->solutions);
    }

    public function experience()
    {
        return $this->experience;
    }

    public function avatar()
    {
        return $this->avatar;
    }

}