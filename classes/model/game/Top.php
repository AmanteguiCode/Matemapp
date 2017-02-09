<?php

class Top
{
    private $size;
    private $field;
    private $equationData = null;

    public function __construct($size, $field)
    {
        $this->size = $size;
        $this->field = $field;
        $this->fillEquations();
    }

    private function fillEquations()
    {
        $query = $this->getData();
        if ($query != false)
            for ($i = 0; $i < count($query); $i++)
                $this->equationData[] = new EquationData($query[$i]['id'], $query[$i]['username'], $query[$i]['equation'], $query[$i]['timestamp'], $query[$i]['nterms'], $query[$i]['mode'], $query[$i]['tries'], $query[$i]['time'], $query[$i]['experience']);
    }

    private function getData()
    {
        return setQuery('*', 'equation', "username='{$_SESSION['user']->username()}' ORDER BY {$this->field} DESC LIMIT {$this->size}", connect());
    }

    public function size()
    {
        return $this->size;
    }

    public function field()
    {
        return $this->field;
    }

    public function equationData()
    {
        return $this->equationData;
    }
}