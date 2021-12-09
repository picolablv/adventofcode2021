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


echo "\n============ part 2 ==============\n";

$input = new FileReader('inputs/1.txt');

$rows = [];

$increased = 0;

foreach ($input->rows() as $row) {
    $rows[] = $row;
}

do {
    $measurement1 = array_slice($rows, 0, 3);
    array_shift($rows);
    $measurement2 = array_slice($rows, 0, 3);

    if (array_sum($measurement1) < array_sum($measurement2)) {
        $increased++;
    }

} while (count($rows) >= 3);

echo $increased . "\n";