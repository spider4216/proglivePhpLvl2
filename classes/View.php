<?php

class View implements Iterator {

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function render($view)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . '/../views/' . $view;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($view)
    {
        echo $this->render($view);
    }


    public function current()
    {
        return $this->data[key($this->data)];
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return $this->data[key($this->data)] !== NULL;
    }

    public function rewind()
    {
        reset($this->data);
    }
}