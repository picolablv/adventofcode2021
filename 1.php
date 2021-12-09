<?php

include "vendor/autoload.php";

$input = new FileReader('inputs/1.txt');

$increased = 0;
$prevValue = 0;

foreach ($input->rows() as $row) {
    if ($row > $prevValue) $increased++;
    $prevValue = $row;
}

echo $increased;