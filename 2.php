<?php

include "vendor/autoload.php";

$input = new FileReader('inputs/2.txt');

$positionX = 0;
$depth = 0;

foreach ($input->rows() as $row) {

    list($instruction, $units) = explode(" ", $row);

    switch ($instruction) {
        case "forward":
            $positionX += (int)$units;
            break;

        case "up":
            $depth -= (int)$units;
            break;

        case "down":
            $depth += (int)$units;
            break;
    }
}

echo($positionX * $depth);

echo "\n============ part 2 ==============\n";

$input = new FileReader('inputs/2.txt');

$positionX = 0;
$depth = 0;
$aim = 0;

foreach ($input->rows() as $row) {

    list($instruction, $units) = explode(" ", $row);

    switch ($instruction) {
        case "forward":
            $positionX += (int)$units;
            $depth += $aim * (int)$units;
            break;

        case "up":
            $aim -= (int)$units;
            break;

        case "down":
            $aim += (int)$units;
            break;
    }
}

echo ($positionX * $depth) . "\n";