<?php

class Cooperative extends Game
{
    private $id = "";

    private $players = [];

    private $answers = [];

    private $rightAnswers = 0;

    private $states;

    public function __construct($id, $equation, $mode, array $players = null, $solutions = null, $answers = null, $states = null)
    {
        $this->id = $id;

        parent::__construct($equation, $mode, true);

        if ($players != null)
            $this->players = $players;
        else
            $this->players[0] = $_SESSION['user']->username();

        if ($solutions != null)
            $this->solutions = $solutions;

        if ($answers != null)
            $this->answers = $answers;

        if ($states != null) {
            $this->states = $states;
        }
    }

    public function id()
    {
        return $this->id;
    }

    public function rightAnswers()
    {
        return $this->rightAnswers;
    }

    public function player1()
    {
        return $this->players[0];
    }

    public function player2()
    {
        return $this->players[1];
    }

    public function player3()
    {
        return $this->players[2];
    }

    public function player4()
    {
        return $this->players[3];
    }

    public function answer1()
    {
        return $this->answers[0];
    }

    public function answer2()
    {
        return $this->answers[1];
    }

    public function answer3()
    {
        return $this->answers[2];
    }

    public function answer4()
    {
        return $this->answers[3];
    }

    public function myAnswer()
    {
        return $this->answers[$this->whichPlayerAmI() - 1];
    }

    public function states()
    {
        return $this->states;
    }

    public function whichPlayerAmI()
    {
        for ($i = 0; $i < count($this->players); $i++) {
            if ($this->players[$i] == $_SESSION['user']->username())
                return ($i + 1);
        }
    }

    public static function newMatch()
    {
        $id = generateRandomString(100);
        $mode = rand(0, 4);
        $equation = (new EquationGenerator(rand(2, 8), $mode))->generate();
        $coop = new Cooperative($id, $equation, $mode);
        $coop->solutions[4] = $coop->getRealSolution();
        insertQuery("equation_cooperative", "id, player1, equation, mode, solution1, solution2, solution3, solution4, solution5, state1", "{$id}, {$_SESSION['user']->username()}, {$equation->toString()}, {$mode}, {$coop->solutions[0]}, {$coop->solutions[1]}, {$coop->solutions[2]}, {$coop->solutions[3]} , {$coop->getRealSolution()}, 1", connect());
        return $coop;
    }


    public function start()
    {
    }

    public function finish()
    {
        if (!$this->isFinished) {
            foreach ($this->answers as $answer) {
                $this->rightAnswers += $answer == $this->getRealSolution();
            }
            $this->calculateExp();
            $_SESSION['user']->addExp($this->experience);
            updateQuery("rightAnswers, experience, finished", "{$this->rightAnswers}, {$this->experience}, 1", "equation_cooperative", "id='{$this->id}'", connect());
        }

        $this->isFinished = true;
    }

    public function calculateExp()
    {

        $this->experience = ($this->mode + 1) * $this->equation->terms() * $this->rightAnswers * $this->rightAnswers;
        return $this->experience;
    }

    public function update($query)
    {
        updateQuery("state" . $this->whichPlayerAmI(), "1", "equation_cooperative", "id='{$this->id}'", connect());

        $this->players = [$query[0]['player1'], $query[0]['player2'], $query[0]['player3'], $query[0]['player4']];
        $this->solutions = [$query[0]['solution1'], $query[0]['solution2'], $query[0]['solution3'], $query[0]['solution4'], $query[0]['solution5']];
        $this->answers = [$query[0]['answer1'], $query[0]['answer2'], $query[0]['answer3'], $query[0]['answer4']];

        $timeouts = [];
        for ($i = 1; $i < 5; $i++) {
            if ($i != $this->whichPlayerAmI()) {
                $timeouts[] = $this->handleState($i, $query[0]['state' . $i]);
            }else{
                $timeouts[] = 0;
            }
        }

        return $timeouts;
    }

    public function handleState($playerNumber, $state)
    {
        $this->states["player" . $playerNumber][] = $state;

        $playerStates = $this->states["player" . $playerNumber];

        if (count($playerStates) == 30){
            $this->states["player" . $playerNumber] = [];
        }


        if (count($playerStates) > 15){
            $counter = 0;
            $countingZeros = false;

            foreach ($playerStates as $state) {
                if ($state){
                    if ($countingZeros)
                        $counter = 0;
                    $counter++;
                    $countingZeros = false;
                }else {
                    if (!$countingZeros)
                        $counter = 0;
                    $counter++;
                    $countingZeros = true;
                }
            }

            if ($counter >= 15){
                if ($countingZeros){
                    updateQuery("player{$playerNumber}, answer{$playerNumber}, state{$playerNumber}", "NULL, NULL, 0", "equation_cooperative", "id='{$this->id}'", connect());
                }else{
                    updateQuery("state{$playerNumber}", "0", "equation_cooperative", "id='{$this->id}'", connect());
                }
                $this->states["player" . $playerNumber] = [];
                return $countingZeros;
            }

        }

        return 0;
    }
}