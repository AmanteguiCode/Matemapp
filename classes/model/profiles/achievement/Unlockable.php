<?php


abstract class Unlockable
{

    private $id = 0;
    private $path = "";
    private $name = "";
    
    const AVATAR = "AVATAR";
    const ACHIEVEMENT = "ACHIEVEMENT";

    public function __construct($id, $path, $name)
    {
        $this->id = $id;
        $this->path = $path;
        $this->name = $name;
    }
    
    public function id()
    {
        return $this->id;
    }
    
    public function path()
    {
        return $this->path;
    }

    public function name()
    {
        return $this->name;
    }

    abstract function unlock();

    protected static function unlockables($type)
    {
        $unlockables = array();
        if ($type == self::AVATAR) {
            foreach (setQuery("*", "avatar", "", connect()) as $row)
                $unlockables[$row['name']] = new Avatar($row['id'], $row['url'], $row['name']);
        } else if ($type == self::ACHIEVEMENT) {
            foreach (setQuery("*", "achievement", "", connect()) as $row)
                $unlockables[$row['name']] = new Achievement($row['id'], $row['url'], $row['name'], $row['description'], $row['condition']);
        }
        return $unlockables;
    }

    protected static function unlockedBy($type, $user)
    {
        if ($type == self::AVATAR) {
            return setQuery("avatar.*", "avatar, user_avatar", "user_avatar.id_avatar=avatar.id AND user_avatar.username='{$user->username()}'", connect());
        } elseif ($type == self::ACHIEVEMENT) {
            return setQuery("achievement.*", "achievement, user_achievement", "user_achievement.id_achievement=achievement.id AND user_achievement.username='{$user->username()}'", connect());
        }
    }

}
