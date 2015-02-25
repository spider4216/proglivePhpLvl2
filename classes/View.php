<?php

class View {

    protected $variableName;
    protected $data;

    public function data($var, $value)
    {
        $this->variableName = $var;
        $this->data = $value;
    }

    public function display($view)
    {
        $var_name = $this->variableName;
        $$var_name = $this->data;
        include __DIR__ . '/../views/' . $view . '.php';
    }
}