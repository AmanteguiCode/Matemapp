<?php
class EquationData{

    private $id;
    private $username;
    private $equation;
    private $timestamp;
    private $nterms;
    private $mode;
    private $tries;
    private $time;
    private $experience;

    public function __construct($id, $username, $equation, $timestamp, $nterms, $mode, $tries, $time, $experience)
    {
        $this->id = $id;
        $this->username = $username;
        $this->equation = $equation;
        $this->timestamp = $timestamp;
        $this->nterms = $nterms;
        $this->mode = $mode;
        $this->tries = $tries;
        $this->time = $time;
        $this->experience = $experience;
    }

    public function id(){
        return $this->id;
    }

    public function username(){
        return $this->username;
    }

    public function equation(){
        return $this->equation;
    }

    public function nterms(){
        return $this->nterms;
    }

    public function mode(){
        return $this->mode;
    }
    public function modeName(){
        switch ($this->mode()){
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
    }

    public function tries(){
        return $this->tries;
    }

    public function trophies($size = 2){
        $trophies = "";
        $trophies .= '<i style="color: #eae367" class="fa fa-trophy fa-' . $size .'x"></i>';
        if ($this->tries == 2)
            $trophies .= '<i style="color: #eae367" class="fa fa-trophy fa-' . $size .'x"></i>';
        else if ($this->tries == 1){
            $trophies .= '<i style="color: #eae367" class="fa fa-trophy fa-' . $size .'x"></i>';
            $trophies .= '<i style="color: #eae367" class="fa fa-trophy fa-' . $size .'x"></i>';
        }

        return $trophies;
    }

    public function experience(){
        return $this->experience;
    }

    public function timeInSeconds(){
        return $this->time;
    }

    public function getFace(){
        if ($this->time <= (15 * ($this->mode + 1)))
            return "sentiment_very_satisfied";

        if ($this->time > (15 * ($this->mode + 1)) && $this->time <= (30 * ($this->mode + 1)))
            return "sentiment_satisfied";

        if ($this->time > (30 * ($this->mode + 1)) && $this->time <= (60 * ($this->mode + 1)))
            return "sentiment_neutral";

        if ($this->time > (60 * ($this->mode + 1)) && $this->time <= (90 * ($this->mode + 1)))
            return "sentiment_dissatisfied";

        return "sentiment_very_dissatisfied";
    }

    public static function getLastEquation($username = null){
        if ($username == null) return false;

        $query = setQuery("*", "equation", "username='{$username}' ORDER BY id DESC LIMIT 1", connect());

        if ($query == false) return false;

        return new EquationData($query[0]['id'], $query[0]['username'], $query[0]['equation'], $query[0]['timestamp'], $query[0]['nterms'], $query[0]['mode'], $query[0]['tries'], $query[0]['time'], $query[0]['experience']);
    }


}