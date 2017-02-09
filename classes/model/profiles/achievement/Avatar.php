<?php

class Avatar extends Unlockable
{
    
    public function __construct($id, $path, $name)
    {
        parent::__construct($id, $path, $name);
    }

    public function unlock()
    {
        if ($this->isRandomAvatar() && !$this->isUnlocked()) {
            TimelineManager::avatarUnlocked($this);
            return insertQuery("user_avatar", "id_avatar, username", "{$this->id()}, {$_SESSION['user']->username()}", connect());
        }
    }

    public function isRandomAvatar()
    {
        return setQuery("*", "avatar", "id='{$this->id()}' AND random=1", connect());
    }

    public function isUnlocked(){
        return setQuery("*", "user_avatar", "username='{$_SESSION['user']->username()}' AND id_avatar={$this->id()}", connect());
    }

    public static function avatars()
    {
        return parent::unlockables(parent::AVATAR);
    }

    public static function myAvatars()
    {
        $avatarsQuery = setQuery("*", "avatar",
            "experienceRequirement <= {$_SESSION['user']->realExperience()} AND random = 0 
            UNION
            SELECT avatar.* from avatar, user_avatar WHERE user_avatar.username='{$_SESSION['user']->username()}' AND user_avatar.id_avatar=avatar.id;", connect());

        $unlockedAvatars = null;

        for ($i = 0; $avatarsQuery != false && $i < count($avatarsQuery); $i++) {
            $unlockedAvatars[] = new Avatar($avatarsQuery[$i]['id'], $avatarsQuery[$i]['url'], $avatarsQuery[$i]['name']);
        }

        return $unlockedAvatars;
    }

}