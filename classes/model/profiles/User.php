<?php

abstract class User
{
    private $name = "";
    private $username = "";
    private $email = "";
    private $avatar;
    private $levelManager;

    public function __construct($username)
    {
        $query = setQuery("name, email, experience", "user", "username='{$username}'", connect());
        $this->name = $query[0]['name'];
        $this->username = $username;
        $this->email = $query[0]['email'];
        $this->buildAvatar();
        $this->levelManager = new LevelManager($query[0]['experience']);
    }

    private function buildAvatar()
    {
        $avatarQuery = setQuery("avatar.id, avatar.name, avatar.url", "avatar, user", "user.username='{$this->username}' AND avatar.id=user.avatar_id", connect());
        $this->avatar = new Avatar($avatarQuery[0]['id'], $avatarQuery[0]['url'], $avatarQuery[0]['name']);
    }

    public function name()
    {
        return $this->name;
    }

    public function username()
    {
        return $this->username;
    }

    public function experience()
    {
        return $this->levelManager->experience();
    }

    public function addExp($experience)
    {
        $this->levelManager->addExp($experience, $this->username);
    }

    public function realExperience()
    {
        return $this->levelManager->realExp();
    }

    public function setName($name)
    {
        if (updateQuery("name", $name, "user", "username='{$this->username}'", connect()) != false) {
            $this->syncCommonData();
        }
    }

    public function email()
    {
        return $this->email;
    }

    abstract function actualClassroom($id = -1);

    public function level()
    {
        return $this->levelManager->level();
    }

    public function hasReachedNextLevel()
    {
        return $this->levelManager->hasReachedNextLevel();
    }

    public function realNextLevelExp()
    {
        return $this->levelManager->realNextLevelExp();
    }

    public function avatarURL()
    {
        return $this->avatar->path();
    }

    abstract public function drawNavigation();

    public function getAvatarPosition()
    {
        return $this->levelManager->calculateAvatarPosition();
    }

    public function isTeacher()
    {
        return $this instanceOf Teacher;
    }

    public function isStudent()
    {
        return $this instanceOf Student;
    }

    abstract public function sync();

    protected function syncCommonData()
    {
        $query = setQuery('name, experience', "user", "username = '{$this->username}'", connect());
        $this->name = $query[0]['name'];
        $this->buildAvatar();
        $this->levelManager = new LevelManager($query[0]['experience']);
    }

    public static function exists($username)
    {
        return !(setQuery("*", "user", "username='{$username}'", connect()) == false);
    }

    public static function emailExists($email)
    {
        return !(setQuery("*", "user", "email='{$email}'", connect()) == false);
    }

}