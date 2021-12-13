<?php

include "vendor/autoload.php";

$input = new FileReader('inputs/7.txt');

$positions = [];

$input->setLength(4048);

foreach ($input->rows() as $row) {
    $positions = explode(",", $row);
}

$count = count($positions);
$sum = array_sum($positions);

$average = round($sum / $count, 0);
$fuel = $fuel_part2 = [];

$fuel = $fuel_part2 = array_fill(min($positions), max($positions) - min($positions) + 1, 0);

for ($i = max($positions); $i >= min($positions); $i--) {
    foreach ($positions as $pos) {
        $steps = abs((int)$i - (int)$pos);
        $fuel[$i] += $steps;

        for ($n = 1; $n <= $steps; $n++) {
            $fuel_part2[$i] += $n;
        }
    }
}

echo "most econ. FUEL:" . min($fuel);
echo "\n";
echo "most econ. FUEL part 2 : " . min($fuel_part2);
echo "\n";