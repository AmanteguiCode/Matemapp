<?php

class Drawer
{

    private $drawer = "";

    public function __construct()
    {
    }

    public function startUL($level)
    {
        $this->drawer .= "<ul class=\"list-level-{$level}\">";
    }

    public function startLI()
    {
        $this->drawer .= "<li>";
    }

    public function startPresentation($url)
    {
        $this->drawer .= "<li role=\"presentation\" class=\"\">";
        $this->startA($url, "toggle-navigation");
        $this->insertGoogleIcon("expand_more");
    }

    public function startA($url, $classes = "", $onclick = "")
    {
        $this->drawer .= "<a id='{$url}' onclick='{$onclick}' class='{$classes} drawer-link' href=\"{$url}\">";
    }

    public function html($html)
    {
        $this->drawer .= $html;
    }

    public function insertGoogleIcon($name)
    {
        $this->drawer .= "<i class=\"icon material-icons\">{$name}</i>";
    }

    public function insertBootstrapIcon($name)
    {
        $this->drawer .= "<i class=\"icon material-icons glyphicon glyphicon-{$name}\"></i>";
    }

    public function insertHTML5Icon($html5Icon)
    {
        $this->drawer .= "<i class=\"icon material-icons fa fa-{$html5Icon}\"></i>";
    }

    public function finishA()
    {
        $this->drawer .= "</a>";
    }

    public function finishLI()
    {
        $this->drawer .= "</li>";
    }

    public function finishPresentation()
    {
        $this->finishLI();
    }

    public function finishUL()
    {
        $this->drawer .= "</ul>";
    }

    public function newLine($url, $name){
        $this->startLI();
        $this->startA($url);
        $this->html($name);
        $this->finishA();
        $this->finishLI();
    }

    public function newLineWithGoogleIcon($url, $googleIconName, $name, $onclick = ""){
        $this->startLI();
        $this->startA($url, "", $onclick);
        $this->insertGoogleIcon($googleIconName);
        $this->html($name);
        $this->finishA();
        $this->finishLI();
    }

    public function newLineWithBootstrapIcon($url, $bootstrapIconName, $name, $onclick = ""){
        $this->startLI();
        $this->startA($url, "", $onclick);
        $this->insertBootstrapIcon($bootstrapIconName);
        $this->html($name);
        $this->finishA();
        $this->finishLI();
    }

    public function newLineWithHTML5Icon($url, $html5Icon, $name, $onclick = ""){
        $this->startLI();
        $this->startA($url, "", $onclick);
        $this->insertHTML5Icon($html5Icon);
        $this->html($name);
        $this->finishA();
        $this->finishLI();
    }

    public function draw()
    {
        return $this->drawer;
    }
}