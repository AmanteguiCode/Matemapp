<?php

class Achievement extends Unlockable
{

    private $description = "";
    private $condition = "";

    public function __construct($id, $path, $name, $description, $condition)
    {
        parent::__construct($id, $path, $name);
        $this->description = $description;
        $this->condition = $condition;
    }


    function unlock()
    {
        if (!$this->isUnlocked()) {
            $_SESSION['user']->addExp(50 * $_SESSION['user']->level());
            TimelineManager::achievementUnlocked($this);
            $_SESSION['achievement'] = $this;
            return insertQuery("user_achievement", "id_achievement, username", "{$this->id()}, {$_SESSION['user']->username()}", connect());
        }
        return false;
    }

    public function description()
    {
        return $this->description;
    }

    public function condition()
    {
        return $this->condition;
    }
    
    public function isUnlocked(){
        return setQuery("*", "user_achievement", "username='{$_SESSION['user']->username()}' AND id_achievement={$this->id()}", connect());
    }

    public static function achievements()
    {
        return parent::unlockables(parent::ACHIEVEMENT);
    }

    public static function unlockedAchievements($user)
    {
        return parent::unlockedBy(parent::ACHIEVEMENT, $user);
    }

    public function myAchievements()
    {
        return parent::unlockedBy(parent::ACHIEVEMENT, $_SESSION['user']);
    }

}