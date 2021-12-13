<?php

class FileReader
{
    protected $handle;

    public $length = 512;

    public function __construct($filePath)
    {
        $this->handle = fopen($filePath, 'r');
    }

    public function rows()
    {
        while (($line = fgets($this->handle, $this->length)) !== false) {

            yield $line;
        }

        fclose($this->handle);

        return;
    }


    public function setLength($length)
    {
        $this->length = $length;
    }
}