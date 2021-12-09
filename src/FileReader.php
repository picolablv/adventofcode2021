<?php

class FileReader
{
    protected $handle;

    public function __construct($filePath)
    {
        $this->handle = fopen($filePath, 'r');
    }

    public function rows()
    {
        while (($line = fgets($this->handle, 512)) !== false) {

            yield $line;
        }

        fclose($this->handle);

        return;
    }
}