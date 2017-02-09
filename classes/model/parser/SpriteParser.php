<?php
class SpriteParser{
    public static function EquationToSprite($equation)
    {
        $html = "";
        for($i = 0; $i < strlen($equation); $i++){
            $digit = substr($equation, $i, 1);
            $html .= "<img class='sprite-number' src='../../../img/sprites/{$digit}.png'/>";
        }
        return $html;
    }
}