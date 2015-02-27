<?php

class View {

    protected $data = [];

    public function data($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function display($view)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        include __DIR__ . '/../views/' . $view . '.php';
    }
}