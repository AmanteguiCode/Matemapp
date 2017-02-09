<?php

class Unit
{

    private $id = 0;
    private $step = 0;
    private $totalTime = 0;
    private $tries = 0;

    private $exerciseTime = 0;

    public function __construct($unit = 0)
    {
        $query = setQuery("*", "classroom_didactic", "username='{$_SESSION['user']->username()}' AND classroom_id={$_SESSION['user']->actualClassroom()->id()} AND unit_id={$unit}", connect());
        $this->id = $unit;
        $this->step = $query[0]['step'];
        $this->totalTime = $query[0]['time'];
        $this->tries = $query[0]['tries'];
    }

    public function id()
    {
        return $this->id;

    }
    public function step()
    {
        return $this->step;
    }

    public function addTry()
    {
        $this->tries++;
    }

    public function startExercise()
    {
        $this->exerciseTime = time();
    }

    public function finishExercise()
    {
        if ($this->exerciseTime == 0) return;
        
        $this->totalTime += time() - $this->exerciseTime;

        $_SESSION['user']->addExp($this->calculateExp());

        $this->exerciseTime = 0;
        $this->step++;
        if ($this->step == 2){
            $_SESSION['achievements']["Botas de amstrong"]->unlock();
        }
        updateQuery("step, time, tries", "{$this->step}, {$this->totalTime}, {$this->tries}", "classroom_didactic", "username='{$_SESSION['user']->username()}' AND classroom_id={$_SESSION['user']->actualClassroom()->id()} AND unit_id={$this->id}", connect());
    }

    public function calculateExp()
    {
        return (120/(time() - $this->exerciseTime)) * ($this->step*$this->step);
    }

}