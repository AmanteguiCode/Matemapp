<?php

class LevelManager
{

    private $experience = 0;
    private $level = 1;
    private $hasReachedNextLevel = false;

    public function __construct($experience)
    {
        $this->experience = $experience;

        while ($experience - $this->nextLevelExp() > 0)
            $this->level++;
    }

    public function experience()
    {
        $this->updateLevel();
        return $this->level > 1 ? round($this->experience - $this->lastLevelExp(), 2) : round($this->experience, 2);
    }

    public function realExp()
    {
        $this->updateLevel();
        return $this->experience;
    }

    public function addExp($experience = 0, $username = "")
    {
        $this->experience += $experience;
        $this->updateLevel();
        updateQuery("experience", ($this->experience), "user", "username='{$username}'", connect());
    }

    public function realNextLevelExp()
    {
        return $this->level > 1 ? $this->nextLevelExp() - $this->lastLevelExp() : $this->nextLevelExp();
    }

    public function nextLevelExp()
    {
        return 75.29 * $this->level * $this->level - 176.5 * $this->level + 127.6;
    }

    private function lastLevelExp()
    {
        return 75.29 * ($this->level - 1) * ($this->level - 1) - 176.5 * ($this->level - 1) + 127.6;
    }

    public function level()
    {
        $this->updateLevel();
        return $this->level;
    }

    public function hasReachedNextLevel()
    {
        if (!$this->hasReachedNextLevel) return false;

        $this->hasReachedNextLevel = !$this->hasReachedNextLevel;
        return !$this->hasReachedNextLevel;
    }
    
    private function updateLevel()
    {
        while ($this->experience - $this->nextLevelExp() > 0) {
            $this->level++;
            $this->hasReachedNextLevel = true;
            TimelineManager::levelUp();
            if ($this->level == 5) $_SESSION['achievements']['Queso']->unlock();
        }
    }
    
    public function calculateAvatarPosition(){
        return ((130 / ($this->realNextLevelExp())) * ($this->experience()))
        - ((130 / ($this->realNextLevelExp())) * (isset($_SESSION['game']) ? $_SESSION['game']->experience() : 0));
    }
}