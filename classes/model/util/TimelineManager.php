<?php

class TimelineManager
{

    public static function retrieveTimeline()
    {
        return setQuery("*", "timeline ORDER BY id DESC LIMIT 100", '', connect());
    }


    public static function levelUp()
    {
        $content = "{$_SESSION['user']->name()} ha alcanzado el nivel {$_SESSION['user']->level()}.";
        self::setData($content);
    }

    public static function avatarUnlocked($avatar = null)
    {
        if ($avatar == null) return;

        $content = "{$_SESSION['user']->name()} ha desbloqueado un avatar nuevo.";
        self::setData($content);
    }

    public static function achievementUnlocked($achievement = null)
    {
        if ($achievement == null) return;

        $content = "{$_SESSION['user']->name()} ha desbloqueado un logro nuevo.";
        self::setData($content);
    }

    public static function enterClassroom($classroom = null)
    {
        if ($classroom == null) return;

        $content = "{$_SESSION['user']->name()} ha entrado al aula {$classroom->name()}.";
        self::setData($content);
    }

    public static function equationFinished($gameObject = null)
    {
        if ($gameObject == null) return;

        $content = "{$_SESSION['user']->name()} ha completado una ecuación de {$gameObject->nTerms()} en dificultad {$gameObject->modeName()}.";
        self::setData($content);
    }

    public static function unitFinished($id = null)
    {
        if ($id == null) return;

        $content = "{$_SESSION['user']->name()} ha completado la unidad número {$id}.";
        self::setData($content);
    }

    private static function setData($content)
    {
        if ($_SESSION['user']->isStudent()) {
            $id = $_SESSION['user']->classroom() != null ? $_SESSION['user']->classroom()->id() : -1;
            insertQuery("timeline", "username, content, classroom_id", "{$_SESSION['user']->username()}, {$content}, {$id}]", connect());
        }
    }

}