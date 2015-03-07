<?php

class Log extends ErrorException {

    private function getErrorInfo()
    {
        return [
            'message' => $this->message,
            'filename' => $this->file,
            'line' => $this->line,
            'time' => time(),
        ];
    }

    public function write()
    {
        $path = __DIR__ . '/../core/error.log';
        $info = implode(' ', $this->getErrorInfo()) . " \n";

        if (file_exists($path)) {
            $text_exist = file_get_contents($path);
            $text = $text_exist . $info;

            return file_put_contents($path, $text);
        }
    }
}