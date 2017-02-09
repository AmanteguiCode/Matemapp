<?php

class Single extends Game
{
    private $tries = 0;

    public function __construct($nTerms = '', $mode, $equation = null)
    {
        if ($nTerms != ''){
            parent::__construct((new EquationGenerator($nTerms, $mode))->generate(), $mode);
        }else{
            parent::__construct($equation, $mode);
        }
    }

    public function findRandomAvatar()
    {

        if (rand(0, 100) <= (5 * ($this->mode() + 1) + ($this->nTerms() * 1.5))) {
            if (setQuery("*", "user_avatar", "username='{$_SESSION['user']->username()}'", connect())) {
                $randomAvatars = setQuery("avatar.*", "avatar, user_avatar", "avatar.id<>user_avatar.id_avatar AND user_avatar.username='{$_SESSION['user']->username()}' AND avatar.random=1", connect());
            } else {
                $randomAvatars = setQuery("*", "avatar", "random=1", connect());
            }

            if (count($randomAvatars) != 0) {
                $avatarFound = $randomAvatars[rand(0, count($randomAvatars) - 1)];
                $avatar = new Avatar($avatarFound['id'], $avatarFound['url'], $avatarFound['name']);
                $this->unlockAvatar($avatar);
                return $avatar;
            }
        }
        return null;
    }



    public function addTry(){
        if (!$this->isFinished) $this->tries++;
    }

    public function calculateExp(){
        $this->experience = (($this->nTerms() * ($this->mode + 1)) / $this->tries) + (5*$_SESSION['user']->level());
    }

    public function start()
    {
        $this->time = time();
    }
    
    public function finish(){

        if ($this->avatar != null && $this->tries == 1)
            $this->avatar->unlock();

        if ($this->mode == 4 && $this->nTerms() >= 6)
            $_SESSION['achievements']["Corona de Isabel I"]->unlock();

        if ($this->mode == 2 && $this->nTerms() >= 4)
            $_SESSION['achievements']["La pólvora"]->unlock();

        updateQuery("done", "1", "classroom_equation", "equation='{$this->equation->toString()}' AND username='{$_SESSION['user']->username()}'", connect());

        $this->time = $this->isFinished ? $this->time : time() - $this->time;

        $this->calculateExp();

        if (!$this->isFinished) {
            $_SESSION['user']->addExp($this->experience);
            insertQuery("equation", "username, equation, nterms, mode, tries, time, experience",
                "{$_SESSION['user']->username()},{$this->equation->toString()},{$this->nTerms()},{$this->mode},{$this->tries},{$this->time},{$this->experience}", connect());
        }

        $this->isFinished = true;
    }


}