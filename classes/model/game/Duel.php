<?php

class Duel extends Game
{

    private $id = "";
    private $player1 = "";
    private $player2 = "";

    private $player1Time = 0;

    private $solution1 = "";
    private $solution2 = "";

    private $winner = "";
    private $reason = "";

    public function __construct($player1, $player2, $equation, $mode)
    {
        parent::__construct($equation, $mode);
        $this->id = generateRandomString(100);
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public static function retrieveDuel($id)
    {
        $duelQuery = setQuery("*", "equation_duel", "id='{$id}' AND finished=0", connect());


        if ($duelQuery == false) return null;

        $duel = new Duel(new Student($duelQuery[0]['player1']), new Student($duelQuery[0]['player2']), Equation::parseEquation($duelQuery[0]['equation']), $duelQuery[0]['mode']);
        $duel->setSolution1($duelQuery[0]['solution1']);
        $duel->id = $duelQuery[0]['id'];
        $duel->player1Time = $duelQuery[0]['time'];
        return $duel;
    }

    public function player1()
    {
        return $this->player1;
    }

    public function player2()
    {
        return $this->player2;
    }

    public function winner()
    {
        return $this->winner;
    }

    public function start()
    {
        $this->time = time();
    }

    public function setSolution1($sol)
    {
        $this->solution1 = $sol;
    }

    public function setSolution2($sol)
    {
        $this->solution2 = $sol;
    }

    public function reason()
    {
        return $this->reason;
    }


    public function finish()
    {
        if ($this->player1->username() == $_SESSION['user']->username()) {
            if ($this->sendDuel()) {
                $time = time() - $this->time;
                insertQuery("equation_duel", "id, player1, player2, equation, solution1, solution2, mode, time", "{$this->id}, {$this->player1->username()}, {$this->player2->username()}, {$this->equation()->toString()}, {$this->solution1}, {$this->solution2}, {$this->mode}, {$time}", connect());
            }
        } else {
            if ($this->solution1 == $this->getRealSolution()) {
                if ($this->solution2 == $this->getRealSolution()) {
                    $this->winner = $this->player1Time >= (time() - $this->time) ? $this->player1 : $this->player2;
                    $this->reason = "Ambos han acertado la respuesta, pero tu compañero/a ha sido más rápido/a.";
                } else {
                    $this->winner = $this->player1;
                    $this->reason = "No has acertado la respuesta, la respuesta correcta es: {$this->getRealSolution()}.";
                }
            } else if ($this->solution2 == $this->getRealSolution()) {
                $this->winner = $this->player2;
                $this->reason = "No has acertado la respuesta, la respuesta correcta es: {$this->getRealSolution()}.";
            } else {
                $this->winner = false;
                $this->reason = "No has acertado la respuesta, la respuesta correcta es: {$this->getRealSolution()}.";
            }

            $this->calculateExp();

            $winnerUsername = null;
            $this->isFinished = true;

            if ($this->winner != false) {
                if ($this->iAmTheWinner())
                    $_SESSION['user']->addExp($this->experience);
                else
                    $this->winner->addExp($this->experience);
                $winnerUsername = $this->winner->username();
            }

            updateQuery("id, player1, player2, equation, solution1, solution2, mode, winner, finished", "{$this->id}, {$this->player1->username()}, {$this->player2->username()}, {$this->equation()->toString()}, {$this->solution1}, {$this->solution2}, {$this->mode}, {$winnerUsername} , 1", "equation_duel", "id='{$this->id}'", connect());

            $this->sendDuelResults();
        }

    }

    private function sendDuelResults()
    {
        $mail = new PHPMailer();

        $mail->CharSet = 'UTF-8';
        $mail->addAddress($this->player1->email());

        $mail->From = "kimoxstudio@gmail.com";
        $mail->FromName = "MateMapp";
        $mail->Subject = "¡Resultados de tu duelo con {$this->player1->name()}!";

        if (!$this->iAmTheWinner()) {
            $text = "\r\r\nFelicidades " . $this->player1->name() . ", has ganado el duelo contra {$this->player2->name()}, aquí tienes tus resultados: \r\n\r\n
        Experiencia obtenida: {$this->experience} pts. \r\n";
        } else {
            $text = "\r\r\nLo sentimos " . $this->player1->name() . ", no has ganado el duelo debido a: \r\n {$this->reason}";
        }

        $mail->Body = $text;
        return $mail->send();
    }


    public function iAmTheWinner()
    {
        return $this->isFinished && $_SESSION['user']->username() == $this->winner->username();
    }

    private function sendDuel()
    {
        $player2Data = setQuery("name, email", "user", "username = '{$this->player2->username()}'", connect());

        $mail = new PHPMailer();

        $mail->CharSet = 'UTF-8';
        $mail->addAddress($player2Data[0]['email']);

        $mail->From = "kimoxstudio@gmail.com";
        $mail->FromName = "MateMapp";
        $mail->Subject = "¡{$_SESSION['user']->name()} te ha retado!";

        $text = "\r\r\nHola " . $player2Data[0]['name'] . ", \r\n\r\n tu compañero/a {$_SESSION['user']->name()} te ha retado. \r\n\r\n
        Aquí puedes acceder a la partida: http://matemapp.adrianmujica.es/play/game.php?id={$this->id}";

        $mail->Body = $text;
        return $mail->send();
    }

    public function calculateExp()
    {
        if ($this->winner->username() == $this->player1->username()) {
            $levelDifference = $this->player2->level() / $this->player1->level();
        } else {
            $levelDifference = $this->player1->level() / $this->player2->level();
        }
        $this->experience = $levelDifference * ($this->mode + 1) * $this->equation->terms();
        return $this->experience;
    }
}